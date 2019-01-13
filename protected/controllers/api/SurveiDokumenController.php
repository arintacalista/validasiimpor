<?php

class SurveiDokumenController extends Controller
{
    public function actionChart()
    {
        $data = [];
        $surveiDokumens = SurveiDokumen::model()->with(['idJenisSurvei', 'idKegiatan', 'idPic', 'surveiDokumenDetails'])->findAll();

        if ($surveiDokumens) {
            foreach ($surveiDokumens as $i => $surveiDokumen) {
                $data[$i]['id'] = $surveiDokumen->id;
                $data[$i]['jenis_survei'] = $surveiDokumen->idJenisSurvei->nama;
                $data[$i]['kegiatan'] = $surveiDokumen->idKegiatan->nama;
                $data[$i]['tanggal_mulai'] = strtotime($surveiDokumen->tanggalDibuatMin) * 1000;
                $data[$i]['tanggal_akhir'] = strtotime($surveiDokumen->tanggalDibuatMax) * 1000;
                $data[$i]['banyak_dokumen'] = $surveiDokumen->banyak_dokumen;
                $data[$i]['dokumen_bersih'] = $surveiDokumen->dokumen_bersih;
                $data[$i]['dokumen_salah'] = $surveiDokumen->dokumen_salah;
                $data[$i]['pic_kode'] = $surveiDokumen->idPic->kode;
                $data[$i]['persentase_selesai'] = $surveiDokumen->persentase_selesai;

                if ($surveiDokumenDetails = $surveiDokumen->surveiDokumenDetails) {
                    foreach ($surveiDokumenDetails as $surveiDokumenDetail) {
                        $data[$i]['deals'][] = [
                            'start' => strtotime($surveiDokumenDetail->tanggal_dibuat) * 1000,
                            'end' => strtotime($surveiDokumenDetail->tanggal_dibuat) * 1000,
                        ];
                    }
                } else {
                    $data[$i]['deals'][] = [];
                }
            }
        }

        header('Content-type: application/json');
        echo CJSON::encode([
            'data' => $data,
        ]);
        Yii::app()->end();
    }
}
