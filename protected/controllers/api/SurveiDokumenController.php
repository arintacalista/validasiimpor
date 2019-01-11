<?php

class SurveiDokumenController extends Controller
{
    public function actionChart()
    {
        $data = [];
        $surveiDokumens = SurveiDokumen::model()->with(['idJenisSurvei', 'idPic'])->findAll();

        if ($surveiDokumens) {
            foreach ($surveiDokumens as $i => $surveiDokumen) {
                $data[$i]['id'] = $surveiDokumen->id;
                $data[$i]['jenis_survei_nama'] = $surveiDokumen->idJenisSurvei->nama;
                $data[$i]['nama'] = $surveiDokumen->nama;
                $data[$i]['tanggal_mulai'] = strtotime($surveiDokumen->tanggal_mulai) * 1000;
                $data[$i]['tanggal_akhir'] = strtotime($surveiDokumen->tanggal_akhir) * 1000;
                $data[$i]['banyak_dokumen'] = $surveiDokumen->banyak_dokumen;
                $data[$i]['dokumen_bersih'] = $surveiDokumen->dokumen_bersih;
                $data[$i]['dokumen_salah'] = $surveiDokumen->dokumen_salah;
                $data[$i]['pic_kode'] = $surveiDokumen->idPic->kode;
                $data[$i]['persentase_selesai'] = $surveiDokumen->persentase_selesai;
                $data[$i]['deals'][] = [
                    'start' => strtotime($surveiDokumen->tanggal_mulai) * 1000,
                    'end' => strtotime($surveiDokumen->tanggal_akhir) * 1000,
                ];
            }
        }

        header('Content-type: application/json');
        echo CJSON::encode([
            'data' => $data,
        ]);
        Yii::app()->end();
    }
}
