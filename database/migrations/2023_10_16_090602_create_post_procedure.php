<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $procedure = "DROP PROCEDURE IF EXISTS `spk_gen_rencana_ops`;

        CREATE PROCEDURE spk_gen_rencana_ops (
            IN xves_id VARCHAR(255),
            IN vrcnno VARCHAR(255)
        )
        BEGIN
            DECLARE xdays INT;
            DECLARE xtempdate DATE;
            DECLARE x INT;
            DECLARE xrcn_awal_kerja VARCHAR(25);
            DECLARE xrcn_akhir_kerja VARCHAR(25);
        
            DELETE FROM spk_t_rcn_header WHERE rcn_no = vrcnno;
            DELETE FROM spk_t_rcn_detail WHERE rcn_no = vrcnno;
            
            INSERT INTO spk_t_rcn_header
            SELECT
                ves_id,
                ves_code,
                ves_name,
                pelayaran,
                in_voyage,
                out_voyage,
                kd_awal,
                kd_akhir,
                rcn_sandar,
                rcn_berangkat,
                rcn_awal_kerja,
                rcn_akhir_kerja,
                vrcnno AS rcn_no,
                40 AS kd_cabang,
                40 AS kd_terminal,
                9 AS kd_regional,
                NOW() AS created_at,
                NOW() AS updated_at,
                0 AS status
            FROM spk_v_rcn_kapal
            WHERE ves_id = xves_id;
        
            SELECT 
                DATEDIFF(CONCAT(DATE_FORMAT(rcn_akhir_kerja, '%Y-%m-%d'), ' 23:59'), CONCAT(DATE_FORMAT(rcn_awal_kerja, '%Y-%m-%d'), ' 00:00')) + 1,
                CONVERT(rcn_awal_kerja, CHAR),
                CONVERT(rcn_akhir_kerja, CHAR)
            INTO xdays, xrcn_awal_kerja, xrcn_akhir_kerja
            FROM spk_v_rcn_kapal
            WHERE ves_id = xves_id;
        
            SET @row_number = 0;
            SET x = 0;
            WHILE x < xdays DO
                INSERT INTO spk_shift_tmp
                SELECT
                    (@row_number := @row_number + 1) AS detail_id,
                    vrcnno,
                    no_shift,
                    CONCAT(DATE_FORMAT(DATE_ADD(rcn_awal_kerja, INTERVAL x DAY), '%Y/%m/%d'), ' ', waktu_mulai) AS mulai,
                    CONCAT(DATE_FORMAT(DATE_ADD(rcn_awal_kerja, INTERVAL x DAY), '%Y/%m/%d'), ' ', waktu_selesai) AS selesai,
                    nama_shift,
                    ves_id
                FROM spk_v_rcn_kapal a
                JOIN spk_m_shift b ON a.ves_id = xves_id;
                
                SET x = x + 1;
            END WHILE;
        
        	DELETE FROM spk_shift_tmp
            WHERE rcn_no = vrcnno AND waktu_selesai < xrcn_awal_kerja;
        
            DELETE FROM spk_shift_tmp
            WHERE rcn_no = vrcnno AND waktu_mulai > xrcn_akhir_kerja;
        
            INSERT INTO spk_t_rcn_detail
            SELECT
                detail_id,
                rcn_no,
                id_shift,
                waktu_mulai,
                waktu_selesai,
                nama_shift,
                xves_id
            FROM spk_shift_tmp
            WHERE rcn_no = vrcnno;
        
            UPDATE spk_t_rcn_detail SET waktu_mulai = xrcn_awal_kerja
            WHERE rcn_no = vrcnno AND waktu_mulai < xrcn_awal_kerja;
        
            UPDATE spk_t_rcn_detail SET waktu_selesai = xrcn_akhir_kerja
            WHERE rcn_no = vrcnno AND waktu_selesai > xrcn_akhir_kerja;
        
            DELETE FROM spk_shift_tmp
            WHERE rcn_no = vrcnno;
            
        END;";
        
        
        DB::unprepared($procedure);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_procedure');
    }
};
