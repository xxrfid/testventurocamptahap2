<?php
if(isset($_GET['tahun']) && $_GET['tahun'] != ''){
    $menu= json_decode(file_get_contents("http://tes-web.landa.id/intermediate/menu"), true);
    $transaksi= json_decode(file_get_contents("http://tes-web.landa.id/intermediate/transaksi?tahun=".$_GET['tahun']), true);

    $tempmenu = [];
    for($i=0; $i<count($menu); $i++){
        if (!array_key_exists($menu[$i]['kategori'], $tempmenu)) {
            $tempmenu[$menu[$i]['kategori']] = [];
        }
        $tempmenu[$menu[$i]['kategori']][] = $menu[$i]['menu'];
    }
    //echo json_encode($tempmenu);
    
    
    $kategori = array_keys($tempmenu);
    
    $temptrx = [];
    for($i=0; $i<count($kategori); $i++){
        $temptrx[$kategori[$i]] = [];
    }
    
    
    for($i=0; $i<count($transaksi); $i++){
        $namanamakanan = $transaksi[$i]['menu'];
        $transaksi[$i]['dateonly'] = date('M', strtotime($transaksi[$i]['tanggal']));
        for($x=0; $x<count($kategori); $x++){
            for($z=0; $z<count($tempmenu[$kategori[$x]]); $z++){
                if($tempmenu[$kategori[$x]][$z] == $namanamakanan){
                    //echo $namanamakanan . $kategori[$x];
                    $transaksi[$i]['kategori'] = $kategori[$x];
                }
            }
        }
    }
    
    //echo json_encode($transaksi).'<br><br>';
    
    
    $tmpmakanan = [];
    $tmpminuman = [];
    for($i=0; $i<count($transaksi); $i++){
        if($transaksi[$i]['kategori'] == 'makanan'){
            if (!array_key_exists($transaksi[$i]['dateonly'], $tmpmakanan[$transaksi[$i]['menu']])){
                $tmpmakanan[$transaksi[$i]['menu']][$transaksi[$i]['dateonly']] = $transaksi[$i]['total'];
            }else{
                $tmpmakanan[$transaksi[$i]['menu']][$transaksi[$i]['dateonly']] = $tmpmakanan[$transaksi[$i]['menu']][$transaksi[$i]['dateonly']]+$transaksi[$i]['total'];
            }
        }
        
        if($transaksi[$i]['kategori'] == 'minuman'){
            if (!array_key_exists($transaksi[$i]['dateonly'], $tmpminuman[$transaksi[$i]['menu']])){
                $tmpminuman[$transaksi[$i]['menu']][$transaksi[$i]['dateonly']] = $transaksi[$i]['total'];
            }else{
                $tmpminuman[$transaksi[$i]['menu']][$transaksi[$i]['dateonly']] = $tmpminuman[$transaksi[$i]['menu']][$transaksi[$i]['dateonly']]+$transaksi[$i]['total'];
            }
        }
    }
    //echo json_encode($tmpmakanan);
    //echo '<br><br>';
    
    
    $ttljan = 0;
    $ttlfeb = 0;
    $ttlmar = 0;
    $ttlapr = 0;
    $ttlmei = 0;
    $ttljun = 0;
    $ttljul = 0;
    $ttlags = 0;
    $ttlsep = 0;
    $ttlokt = 0;
    $ttlnov = 0;
    $ttldes = 0;
    $ttltotal = 0;
    
    $htmlmakanan = '';
    $kategoritmpmakanan = array_keys($tmpmakanan);
    for($a=0; $a<count($tempmenu['makanan']); $a++){ //fix bug menu tertinggal, dan mengurutkan sesuai api menu
        $tmphtml = '';
        for($i=0; $i<count($kategoritmpmakanan); $i++){
            if($kategoritmpmakanan[$i] == $tempmenu['makanan'][$a]){
                $jan = '';
                $feb = '';
                $mar = '';
                $apr = '';
                $mei = '';
                $jun = '';
                $jul = '';
                $ags = '';
                $sep = '';
                $okt = '';
                $nov = '';
                $des = '';
                $total = 0;
                if (array_key_exists('Jan', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $jan = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Jan'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Jan'];
                    $ttljan = $ttljan + $tmpmakanan[$kategoritmpmakanan[$i]]['Jan'];
                }
                if (array_key_exists('Feb', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $feb = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Feb'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Feb'];
                    $ttlfeb = $ttlfeb + $tmpmakanan[$kategoritmpmakanan[$i]]['Feb'];
                }
                if (array_key_exists('Mar', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $mar = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Mar'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Mar'];
                    $ttlmar = $ttlmar + $tmpmakanan[$kategoritmpmakanan[$i]]['Mar'];
                }
                if (array_key_exists('Apr', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $apr = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Apr'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Apr'];
                    $ttlapr = $ttlapr + $tmpmakanan[$kategoritmpmakanan[$i]]['Apr'];
                }
                if (array_key_exists('May', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $mei = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['May'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['May'];
                    $ttlmei = $ttlmei + $tmpmakanan[$kategoritmpmakanan[$i]]['May'];
                }
                if (array_key_exists('Jun', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $jun = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Jun'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Jun'];
                    $ttljun = $ttljun + $tmpmakanan[$kategoritmpmakanan[$i]]['Jun'];
                }
                if (array_key_exists('Jul', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $jul = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Jul'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Jul'];
                    $ttljul = $ttljul + $tmpmakanan[$kategoritmpmakanan[$i]]['Jul'];
                }
                if (array_key_exists('Aug', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $ags = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Aug'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Aug'];
                    $ttlags = $ttlags + $tmpmakanan[$kategoritmpmakanan[$i]]['Aug'];
                }
                if (array_key_exists('Sep', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $sep = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Sep'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Sep'];
                    $ttlsep = $ttlsep + $tmpmakanan[$kategoritmpmakanan[$i]]['Sep'];
                }
                if (array_key_exists('Oct', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $okt = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Oct'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Oct'];
                    $ttlokt = $ttlokt + $tmpmakanan[$kategoritmpmakanan[$i]]['Oct'];
                }
                if (array_key_exists('Nov', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $nov = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Nov'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Nov'];
                    $ttlnov = $ttlnov + $tmpmakanan[$kategoritmpmakanan[$i]]['Nov'];
                }
                if (array_key_exists('Dec', $tmpmakanan[$kategoritmpmakanan[$i]])){
                    $des = number_format($tmpmakanan[$kategoritmpmakanan[$i]]['Dec'],0,'.',',');
                    $total = $total+$tmpmakanan[$kategoritmpmakanan[$i]]['Dec'];
                    $ttldes = $ttldes + $tmpmakanan[$kategoritmpmakanan[$i]]['Dec'];
                }
                
                $ttltotal = $ttltotal + $total;
                if($total == 0){
                    $total = '';
                }else{
                    $total = number_format($total,0,'.',',');
                }
                $tmphtml = '<tr>
                                    <td>'.$kategoritmpmakanan[$i].'</td>
                                    <td style="text-align: right;">
                                        '.$jan.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$feb.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$mar.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$apr.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$mei.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$jun.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$jul.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$ags.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$sep.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$okt.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$nov.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$des.'
                                    </td>
                                    <td style="text-align: right;"><b>'.$total.'</b></td>
                                </tr>';
            }
        }
        if($tmphtml != ''){
            $htmlmakanan .= $tmphtml;
        }else{
            //$htmlmakanan .= 'invalidblank'.$tempmenu['makanan'][$a];
            //fix bug menu tertinggal, menginputkan value yang tidak ada pada daftar transaksi
            $htmlmakanan .= '<tr>
                              <td>'.$tempmenu['makanan'][$a].'</td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;">
                                <b>0</b>
                              </td>
                            </tr>';
        }
    }
    
    
    
    $htmlminuman = '';
    $kategoritmpminuman = array_keys($tmpminuman);
    for($a=0; $a<count($tempmenu['minuman']); $a++){ //fix bug menu tertinggal, dan mengurutkan sesuai api menu
        $tmphtml = '';
        for($i=0; $i<count($kategoritmpminuman); $i++){
            if($kategoritmpminuman[$i] == $tempmenu['minuman'][$a]){
                $jan = '';
                $feb = '';
                $mar = '';
                $apr = '';
                $mei = '';
                $jun = '';
                $jul = '';
                $ags = '';
                $sep = '';
                $okt = '';
                $nov = '';
                $des = '';
                $total = 0;
                if (array_key_exists('Jan', $tmpminuman[$kategoritmpminuman[$i]])){
                    $jan = number_format($tmpminuman[$kategoritmpminuman[$i]]['Jan'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Jan'];
                    $ttljan = $ttljan + $tmpminuman[$kategoritmpminuman[$i]]['Jan'];
                }
                if (array_key_exists('Feb', $tmpminuman[$kategoritmpminuman[$i]])){
                    $feb = number_format($tmpminuman[$kategoritmpminuman[$i]]['Feb'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Feb'];
                    $ttlfeb = $ttlfeb + $tmpminuman[$kategoritmpminuman[$i]]['Feb'];
                }
                if (array_key_exists('Mar', $tmpminuman[$kategoritmpminuman[$i]])){
                    $mar = number_format($tmpminuman[$kategoritmpminuman[$i]]['Mar'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Mar'];
                    $ttlmar = $ttlmar + $tmpminuman[$kategoritmpminuman[$i]]['Mar'];
                }
                if (array_key_exists('Apr', $tmpminuman[$kategoritmpminuman[$i]])){
                    $apr = number_format($tmpminuman[$kategoritmpminuman[$i]]['Apr'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Apr'];
                    $ttlapr = $ttlapr + $tmpminuman[$kategoritmpminuman[$i]]['Apr'];
                }
                if (array_key_exists('May', $tmpminuman[$kategoritmpminuman[$i]])){
                    $mei = number_format($tmpminuman[$kategoritmpminuman[$i]]['May'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['May'];
                    $ttlmei = $ttlmei + $tmpminuman[$kategoritmpminuman[$i]]['May'];
                }
                if (array_key_exists('Jun', $tmpminuman[$kategoritmpminuman[$i]])){
                    $jun = number_format($tmpminuman[$kategoritmpminuman[$i]]['Jun'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Jun'];
                    $ttljun = $ttljun + $tmpminuman[$kategoritmpminuman[$i]]['Jun'];
                }
                if (array_key_exists('Jul', $tmpminuman[$kategoritmpminuman[$i]])){
                    $jul = number_format($tmpminuman[$kategoritmpminuman[$i]]['Jul'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Jul'];
                    $ttljul = $ttljul + $tmpminuman[$kategoritmpminuman[$i]]['Jul'];
                }
                if (array_key_exists('Aug', $tmpminuman[$kategoritmpminuman[$i]])){
                    $ags = number_format($tmpminuman[$kategoritmpminuman[$i]]['Aug'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Aug'];
                    $ttlags = $ttlags + $tmpminuman[$kategoritmpminuman[$i]]['Aug'];
                }
                if (array_key_exists('Sep', $tmpminuman[$kategoritmpminuman[$i]])){
                    $sep = number_format($tmpminuman[$kategoritmpminuman[$i]]['Sep'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Sep'];
                    $ttlsep = $ttlsep + $tmpminuman[$kategoritmpminuman[$i]]['Sep'];
                }
                if (array_key_exists('Oct', $tmpminuman[$kategoritmpminuman[$i]])){
                    $okt = number_format($tmpminuman[$kategoritmpminuman[$i]]['Oct'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Oct'];
                    $ttlokt = $ttlokt + $tmpminuman[$kategoritmpminuman[$i]]['Oct'];
                }
                if (array_key_exists('Nov', $tmpminuman[$kategoritmpminuman[$i]])){
                    $nov = number_format($tmpminuman[$kategoritmpminuman[$i]]['Nov'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Nov'];
                    $ttlnov = $ttlnov + $tmpminuman[$kategoritmpminuman[$i]]['Nov'];
                }
                if (array_key_exists('Dec', $tmpminuman[$kategoritmpminuman[$i]])){
                    $des = number_format($tmpminuman[$kategoritmpminuman[$i]]['Dec'],0,'.',',');
                    $total = $total+$tmpminuman[$kategoritmpminuman[$i]]['Dec'];
                    $ttldes = $ttldes + $tmpminuman[$kategoritmpminuman[$i]]['Dec'];
                }
                
                $ttltotal = $ttltotal + $total;
                if($total == 0){
                    $total = '';
                }else{
                    $total = number_format($total,0,'.',',');
                }
                $tmphtml = '<tr>
                                    <td>'.$kategoritmpminuman[$i].'</td>
                                    <td style="text-align: right;">
                                        '.$jan.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$feb.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$mar.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$apr.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$mei.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$jun.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$jul.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$ags.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$sep.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$okt.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$nov.'
                                    </td>
                                    <td style="text-align: right;">
                                        '.$des.'
                                    </td>
                                    <td style="text-align: right;"><b>'.$total.'</b></td>
                                </tr>';
            }
        }
        if($tmphtml != ''){
            $htmlminuman .= $tmphtml;
        }else{
            //$htmlminuman .= 'invalidblank'.$tempmenu['minuman'][$a];
            //fix bug menu tertinggal, menginputkan value yang tidak ada pada daftar transaksi
            $htmlminuman .= '<tr>
                              <td>'.$tempmenu['minuman'][$a].'</td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;"></td>
                              <td style="text-align: right;">
                                <b>0</b>
                              </td>
                            </tr>';
        }
    }
    
    
    
    
    if($ttljan == 0){
        $ttljan = '';
    }else{
        $ttljan = number_format($ttljan,0,'.',',');
    }
    if($ttlfeb == 0){
        $ttlfeb = '';
    }else{
        $ttlfeb = number_format($ttlfeb,0,'.',',');
    }
    if($ttlmar == 0){
        $ttlmar = '';
    }else{
        $ttlmar = number_format($ttlmar,0,'.',',');
    }
    if($ttlapr == 0){
        $ttlapr = '';
    }else{
        $ttlapr = number_format($ttlapr,0,'.',',');
    }
    if($ttlmei == 0){
        $ttlmei = '';
    }else{
        $ttlmei = number_format($ttlmei,0,'.',',');
    }
    if($ttljun == 0){
        $ttljun = '';
    }else{
        $ttljun = number_format($ttljun,0,'.',',');
    }
    if($ttljul == 0){
        $ttljul = '';
    }else{
        $ttljul = number_format($ttljul,0,'.',',');
    }
    if($ttlags == 0){
        $ttlags = '';
    }else{
        $ttlags = number_format($ttlags,0,'.',',');
    }
    if($ttlsep == 0){
        $ttlsep = '';
    }else{
        $ttlsep = number_format($ttlsep,0,'.',',');
    }
    if($ttlokt == 0){
        $ttlokt = '';
    }else{
        $ttlokt = number_format($ttlokt,0,'.',',');
    }
    if($ttlnov == 0){
        $ttlnov = '';
    }else{
        $ttlnov = number_format($ttlnov,0,'.',',');
    }
    if($ttldes == 0){
        $ttldes = '';
    }else{
        $ttldes = number_format($ttldes,0,'.',',');
    }
    if($ttltotal == 0){
        $ttltotal = '';
    }else{
        $ttltotal = number_format($ttltotal,0,'.',',');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        td,
        th {
            font-size: 11px;
        }
    </style>


    <title>TES - Venturo Camp Tahap 2</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card" style="margin: 2rem 0rem;">
            <div class="card-header">
                Venturo - Laporan penjualan tahunan per menu
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <select id="my-select" class="form-control" name="tahun">
                                    <option value="">Pilih Tahun</option>
                                    <option value="2021" <?php echo ($_GET['tahun'] == '2021') ? 'selected=""' : ''; ?>>2021</option>
                                    <option value="2022" <?php echo ($_GET['tahun'] == '2022') ? 'selected=""' : ''; ?>>2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">
                                Tampilkan
                            </button>
                            <a href="http://tes-web.landa.id/intermediate/menu" target="_blank" rel="Array Menu" class="btn btn-secondary">
                                Json Menu
                            </a>
                            <a href="http://tes-web.landa.id/intermediate/transaksi?tahun=<?php echo $_GET['tahun']; ?>" target="_blank" rel="Array Transaksi" class="btn btn-secondary">
                                Json Transaksi
                            </a>
                        </div>
                    </div>
                </form>
<?php if(isset($_GET['tahun']) && $_GET['tahun'] != ''){ ?>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="margin: 0;">
                        <thead>
                            <tr class="table-dark">
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">Menu</th>
                                <th colspan="12" style="text-align: center;">Periode Pada <?php echo $_GET['tahun']; ?>
                                </th>
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total</th>
                            </tr>
                            <tr class="table-dark">
                                <th style="text-align: center;width: 75px;">Jan</th>
                                <th style="text-align: center;width: 75px;">Feb</th>
                                <th style="text-align: center;width: 75px;">Mar</th>
                                <th style="text-align: center;width: 75px;">Apr</th>
                                <th style="text-align: center;width: 75px;">Mei</th>
                                <th style="text-align: center;width: 75px;">Jun</th>
                                <th style="text-align: center;width: 75px;">Jul</th>
                                <th style="text-align: center;width: 75px;">Ags</th>
                                <th style="text-align: center;width: 75px;">Sep</th>
                                <th style="text-align: center;width: 75px;">Okt</th>
                                <th style="text-align: center;width: 75px;">Nov</th>
                                <th style="text-align: center;width: 75px;">Des</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-secondary" colspan="14"><b>Makanan</b></td>
                            </tr>
                            <?php echo $htmlmakanan; ?>
                            <tr>
                                <td class="table-secondary" colspan="14"><b>Minuman</b></td>
                            </tr>
                            <?php echo $htmlminuman; ?>
                            <tr class="table-dark">
                                <td><b>Total</b></td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttljan; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttlfeb; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttlmar; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttlapr; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttlmei; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttljun; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttljul; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttlags; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttlsep; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttlokt; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttlnov; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttldes; ?></b>
                                </td>
                                <td style="text-align: right;">
                                    <b><?php echo $ttltotal; ?></b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
<?php } ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>