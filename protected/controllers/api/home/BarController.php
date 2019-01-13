<?php

class BarController extends Controller
{
	public function actionCategories()
	{
        $data = [];
        $surveiDokumens = SurveiDokumen::model()->with(['idJenisSurvei', 'idKegiatan', 'idPic'])->findAll();

        if ($surveiDokumens) {
            foreach ($surveiDokumens as $i => $surveiDokumen) {
                $data[] = $surveiDokumen->idJenisSurvei->nama.' - '.$surveiDokumen->idKegiatan->nama;
            }
        }

        header('Content-type: application/json');
        echo CJSON::encode([
            'data' => $data,
        ]);
        Yii::app()->end();
	}

    public function actionSeriesData()
    {
        $data = [];
        $surveiDokumens = SurveiDokumen::model()->with(['idJenisSurvei', 'idKegiatan', 'idPic'])->findAll();

        if ($surveiDokumens) {
            foreach ($surveiDokumens as $i => $surveiDokumen) {
                if ($surveiDokumen->persentase_selesai > 0 && $surveiDokumen->persentase_selesai <= 50) {
                    $color = 'red';
                } else if ($surveiDokumen->persentase_selesai > 50 && $surveiDokumen->persentase_selesai < 100) {
                    $color = 'yellow';
                } else if ($surveiDokumen->persentase_selesai == 100) {
                    $color = 'green';
                }

                $data[] = [
                    'color' => $color,
                    'y' => ceil($surveiDokumen->persentase_selesai),
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
