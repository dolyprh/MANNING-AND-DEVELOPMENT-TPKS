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

        CREATE DEFINER=`root`@`localhost` PROCEDURE `spk_gen_rencana_ops`(
            IN xves_id VARCHAR(255),
            IN vuser VARCHAR(255),
            IN vrcnno VARCHAR(255)
        )
        BEGIN
            DECLARE xrcn_no VARCHAR(20);
            DECLARE xdays INT;
            DECLARE xtempdate DATE;
            DECLARE x INT;
            DECLARE xrcn_awal_kerja DATE;
            DECLARE xrcn_akhir_kerja DATE;
        
            -- TRIGGER: rcn_no dipindah ke atas sebelum delete
            IF vrcnno IS NULL THEN
                SET xrcn_no = CONCAT('RCN-', xves_id, DATE_FORMAT(NOW(), '%d%m%Y'));
            ELSE
                SET xrcn_no = vrcnno;
            END IF;
        
            DELETE FROM spk_t_rcn_header WHERE rcn_no = xrcn_no;
            DELETE FROM spk_t_rcn_detail WHERE rcn_no = xrcn_no;
        
            COMMIT;
        
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
                xrcn_no AS rcn_no,
                40 AS kd_cabang,
                40 AS kd_terminal,
                9 AS kd_regional,
                NOW() AS created_date,
                NOW() AS updated_date,
                0 AS status
            FROM spk_v_rcn_kapal
            WHERE ves_id = xves_id;
        
            COMMIT;
        
            SELECT
                DATEDIFF(rcn_akhir_kerja, rcn_awal_kerja) + 1,
                rcn_awal_kerja,
                rcn_akhir_kerja
            INTO xdays, xrcn_awal_kerja, xrcn_akhir_kerja
            FROM spk_v_rcn_kapal
            WHERE ves_id = xves_id;
        
            SET x = 0;
            WHILE x < xdays DO
                INSERT INTO spk_shift_tmp
                SELECT
                    NULL,
                    xrcn_no,
                    id_shift,
                    DATE_FORMAT(CONCAT(DATE(xrcn_awal_kerja), ' ', waktu_mulai), '%Y-%m-%d %H:%i') AS mulai,
                    DATE_FORMAT(CONCAT(DATE(xrcn_awal_kerja), ' ', waktu_selesai), '%Y-%m-%d %H:%i') AS selesai,
                    nama_shift
                FROM spk_v_rcn_kapal AS a
                JOIN spk_m_shift AS b ON a.id_shift = b.id_shift
                WHERE ves_id = xves_id;
        
                COMMIT;
                SET x = x + 1;
            END WHILE;
        
            DELETE FROM spk_shift_tmp
            WHERE rcn_no = xrcn_no AND DATE(waktu_selesai) < xrcn_awal_kerja;
        
            COMMIT;
        
            DELETE FROM spk_shift_tmp
            WHERE rcn_no = xrcn_no AND DATE(waktu_mulai) > xrcn_akhir_kerja;
        
            COMMIT;
        
            INSERT INTO spk_t_rcn_detail
            SELECT
                NULL,
                rcn_no,
                id_shift,
                waktu_mulai,
                waktu_selesai,
                nama_shift,
                xves_id
            FROM spk_shift_tmp
            WHERE rcn_no = xrcn_no;
        
            COMMIT;
        
            UPDATE spk_t_rcn_detail
            SET waktu_mulai = xrcn_awal_kerja
            WHERE rcn_no = xrcn_no AND waktu_mulai < xrcn_awal_kerja;
        
            UPDATE spk_t_rcn_detail
            SET waktu_selesai = xrcn_akhir_kerja
            WHERE rcn_no = xrcn_no AND waktu_selesai > xrcn_akhir_kerja;
        
            COMMIT;
        
            DELETE FROM spk_shift_tmp WHERE rcn_no = xrcn_no;
        
            COMMIT;
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
