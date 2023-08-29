<?php
if(isset($_GET['tahun']) && $_GET['tahun'] != ''){
    $menu= json_decode(file_get_contents("http://tes-web.landa.id/intermediate/menu"), true);
    $transaksi= json_decode(file_get_contents("http://tes-web.landa.id/intermediate/transaksi?tahun=".$_GET['tahun']), true);

    //start try simpling array 12:51
    $htmlmakanan = '';
    $htmlminuman = '';
    
    
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
    
    $ttlmkjan = 0;
    $ttlmkfeb = 0;
    $ttlmkmar = 0;
    $ttlmkapr = 0;
    $ttlmkmei = 0;
    $ttlmkjun = 0;
    $ttlmkjul = 0;
    $ttlmkags = 0;
    $ttlmksep = 0;
    $ttlmkokt = 0;
    $ttlmknov = 0;
    $ttlmkdes = 0;
    $ttlmktotal = 0;
    
    $ttlminjan = 0;
    $ttlminfeb = 0;
    $ttlminmar = 0;
    $ttlminapr = 0;
    $ttlminmei = 0;
    $ttlminjun = 0;
    $ttlminjul = 0;
    $ttlminags = 0;
    $ttlminsep = 0;
    $ttlminokt = 0;
    $ttlminnov = 0;
    $ttlmindes = 0;
    $ttlmintotal = 0;
    
    for($i=0; $i<count($menu); $i++){
        $menu[$i]['x1'] = 0;
        $menu[$i]['x2'] = 0;
        $menu[$i]['x3'] = 0;
        $menu[$i]['x4'] = 0;
        $menu[$i]['x5'] = 0;
        $menu[$i]['x6'] = 0;
        $menu[$i]['x7'] = 0;
        $menu[$i]['x8'] = 0;
        $menu[$i]['x9'] = 0;
        $menu[$i]['x10'] = 0;
        $menu[$i]['x11'] = 0;
        $menu[$i]['x12'] = 0;
        for($x=0; $x<count($transaksi); $x++){
            if($menu[$i]['menu'] == $transaksi[$x]['menu']){
                $monthname = date('M', strtotime($transaksi[$x]['tanggal']));
                if($monthname == 'Jan'){
                    $menu[$i]['x1'] = $menu[$i]['x1']+$transaksi[$x]['total'];
                }
                if($monthname == 'Feb'){
                    $menu[$i]['x2'] = $menu[$i]['x2']+$transaksi[$x]['total'];
                }
                if($monthname == 'Mar'){
                    $menu[$i]['x3'] = $menu[$i]['x3']+$transaksi[$x]['total'];
                }
                if($monthname == 'Apr'){
                    $menu[$i]['x4'] = $menu[$i]['x4']+$transaksi[$x]['total'];
                }
                if($monthname == 'May'){
                    $menu[$i]['x5'] = $menu[$i]['x5']+$transaksi[$x]['total'];
                }
                if($monthname == 'Jun'){
                    $menu[$i]['x6'] = $menu[$i]['x6']+$transaksi[$x]['total'];
                }
                if($monthname == 'Jul'){
                    $menu[$i]['x7'] = $menu[$i]['x7']+$transaksi[$x]['total'];
                }
                if($monthname == 'Aug'){
                    $menu[$i]['x8'] = $menu[$i]['x8']+$transaksi[$x]['total'];
                }
                if($monthname == 'Sep'){
                    $menu[$i]['x9'] = $menu[$i]['x9']+$transaksi[$x]['total'];
                }
                if($monthname == 'Oct'){
                    $menu[$i]['x10'] = $menu[$i]['x10']+$transaksi[$x]['total'];
                }
                if($monthname == 'Nov'){
                    $menu[$i]['x11'] = $menu[$i]['x11']+$transaksi[$x]['total'];
                }
                if($monthname == 'Dec'){
                    $menu[$i]['x12'] = $menu[$i]['x12']+$transaksi[$x]['total'];
                }
                
            }
        }
        
        
        $menu[$i]['xtotal'] = $menu[$i]['x1']+$menu[$i]['x2']+$menu[$i]['x3']+$menu[$i]['x4']+$menu[$i]['x5']+$menu[$i]['x6']+$menu[$i]['x7']+$menu[$i]['x8']+$menu[$i]['x9']+$menu[$i]['x10']+$menu[$i]['x11']+$menu[$i]['x12'];
        
        if($menu[$i]['kategori'] == 'makanan'){
            $ttlmkjan = $ttlmkjan + $menu[$i]['x1'];
            $ttlmkfeb = $ttlmkfeb + $menu[$i]['x2'];
            $ttlmkmar = $ttlmkmar + $menu[$i]['x3'];
            $ttlmkapr = $ttlmkapr + $menu[$i]['x4'];
            $ttlmkmei = $ttlmkmei + $menu[$i]['x5'];
            $ttlmkjun = $ttlmkjun + $menu[$i]['x6'];
            $ttlmkjul = $ttlmkjul + $menu[$i]['x7'];
            $ttlmkags = $ttlmkags + $menu[$i]['x8'];
            $ttlmksep = $ttlmksep + $menu[$i]['x9'];
            $ttlmkokt = $ttlmkokt + $menu[$i]['x10'];
            $ttlmknov = $ttlmknov + $menu[$i]['x11'];
            $ttlmkdes = $ttlmkdes + $menu[$i]['x12'];
            $ttlmktotal = $ttlmktotal + $menu[$i]['xtotal'];
        }
        if($menu[$i]['kategori'] == 'minuman'){
            $ttlminjan = $ttlminjan + $menu[$i]['x1'];
            $ttlminfeb = $ttlminfeb + $menu[$i]['x2'];
            $ttlminmar = $ttlminmar + $menu[$i]['x3'];
            $ttlminapr = $ttlminapr + $menu[$i]['x4'];
            $ttlminmei = $ttlminmei + $menu[$i]['x5'];
            $ttlminjun = $ttlminjun + $menu[$i]['x6'];
            $ttlminjul = $ttlminjul + $menu[$i]['x7'];
            $ttlminags = $ttlminags + $menu[$i]['x8'];
            $ttlminsep = $ttlminsep + $menu[$i]['x9'];
            $ttlminokt = $ttlminokt + $menu[$i]['x10'];
            $ttlminnov = $ttlminnov + $menu[$i]['x11'];
            $ttlmindes = $ttlmindes + $menu[$i]['x12'];
            $ttlmintotal = $ttlmintotal + $menu[$i]['xtotal'];
        }
        
        $ttljan = $ttljan + $menu[$i]['x1'];
        $ttlfeb = $ttlfeb + $menu[$i]['x2'];
        $ttlmar = $ttlmar + $menu[$i]['x3'];
        $ttlapr = $ttlapr + $menu[$i]['x4'];
        $ttlmei = $ttlmei + $menu[$i]['x5'];
        $ttljun = $ttljun + $menu[$i]['x6'];
        $ttljul = $ttljul + $menu[$i]['x7'];
        $ttlags = $ttlags + $menu[$i]['x8'];
        $ttlsep = $ttlsep + $menu[$i]['x9'];
        $ttlokt = $ttlokt + $menu[$i]['x10'];
        $ttlnov = $ttlnov + $menu[$i]['x11'];
        $ttldes = $ttldes + $menu[$i]['x12'];
        $ttltotal = $ttltotal + $menu[$i]['xtotal'];
        
        if($menu[$i]['x1'] == 0){
            $menu[$i]['x1'] = '';
        }
        if($menu[$i]['x2'] == 0){
            $menu[$i]['x2'] = '';
        }
        if($menu[$i]['x3'] == 0){
            $menu[$i]['x3'] = '';
        }
        if($menu[$i]['x4'] == 0){
            $menu[$i]['x4'] = '';
        }
        if($menu[$i]['x5'] == 0){
            $menu[$i]['x5'] = '';
        }
        if($menu[$i]['x6'] == 0){
            $menu[$i]['x6'] = '';
        }
        if($menu[$i]['x7'] == 0){
            $menu[$i]['x7'] = '';
        }
        if($menu[$i]['x8'] == 0){
            $menu[$i]['x8'] = '';
        }
        if($menu[$i]['x9'] == 0){
            $menu[$i]['x9'] = '';
        }
        if($menu[$i]['x10'] == 0){
            $menu[$i]['x10'] = '';
        }
        if($menu[$i]['x11'] == 0){
            $menu[$i]['x11'] = '';
        }
        if($menu[$i]['x12'] == 0){
            $menu[$i]['x12'] = '';
        }
        if($menu[$i]['kategori'] == 'makanan'){
            $htmlmakanan .= '<tr>
                            <td>'.$menu[$i]['menu'].'</td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x1'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x2'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x3'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x4'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x5'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x6'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x7'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x8'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x9'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x10'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x11'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x12'],0,'.',',').'
                            </td>
                            <td style="text-align: right;"><b>'.number_format($menu[$i]['xtotal'],0,'.',',').'</b></td>
                        </tr>';
        }elseif($menu[$i]['kategori'] == 'minuman'){
            $htmlminuman .= '<tr>
                            <td>'.$menu[$i]['menu'].'</td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x1'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x2'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x3'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x4'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x5'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x6'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x7'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x8'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x9'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x10'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x11'],0,'.',',').'
                            </td>
                            <td style="text-align: right;">
                                '.number_format($menu[$i]['x12'],0,'.',',').'
                            </td>
                            <td style="text-align: right;"><b>'.number_format($menu[$i]['xtotal'],0,'.',',').'</b></td>
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
        $ttltotal = '0';
    }else{
        $ttltotal = number_format($ttltotal,0,'.',',');
    }
    //finish try simpling array 13:23
    
    
    
    if($ttlmkjan == 0){
        $ttlmkjan = '';
    }else{
        $ttlmkjan = number_format($ttlmkjan,0,'.',',');
    }
    if($ttlmkfeb == 0){
        $ttlmkfeb = '';
    }else{
        $ttlmkfeb = number_format($ttlmkfeb,0,'.',',');
    }
    if($ttlmkmar == 0){
        $ttlmkmar = '';
    }else{
        $ttlmkmar = number_format($ttlmkmar,0,'.',',');
    }
    if($ttlmkapr == 0){
        $ttlmkapr = '';
    }else{
        $ttlmkapr = number_format($ttlmkapr,0,'.',',');
    }
    if($ttlmkmei == 0){
        $ttlmkmei = '';
    }else{
        $ttlmkmei = number_format($ttlmkmei,0,'.',',');
    }
    if($ttlmkjun == 0){
        $ttlmkjun = '';
    }else{
        $ttlmkjun = number_format($ttlmkjun,0,'.',',');
    }
    if($ttlmkjul == 0){
        $ttlmkjul = '';
    }else{
        $ttlmkjul = number_format($ttlmkjul,0,'.',',');
    }
    if($ttlmkags == 0){
        $ttlmkags = '';
    }else{
        $ttlmkags = number_format($ttlmkags,0,'.',',');
    }
    if($ttlmksep == 0){
        $ttlmksep = '';
    }else{
        $ttlmksep = number_format($ttlmksep,0,'.',',');
    }
    if($ttlmkokt == 0){
        $ttlmkokt = '';
    }else{
        $ttlmkokt = number_format($ttlmkokt,0,'.',',');
    }
    if($ttlmknov == 0){
        $ttlmknov = '';
    }else{
        $ttlmknov = number_format($ttlmknov,0,'.',',');
    }
    if($ttlmkdes == 0){
        $ttlmkdes = '';
    }else{
        $ttlmkdes = number_format($ttlmkdes,0,'.',',');
    }
    if($ttlmktotal == 0){
        $ttlmktotal = '0';
    }else{
        $ttlmktotal = number_format($ttlmktotal,0,'.',',');
    }
    
    


    if($ttlminjan == 0){
        $ttlminjan = '';
    }else{
        $ttlminjan = number_format($ttlminjan,0,'.',',');
    }
    if($ttlminfeb == 0){
        $ttlminfeb = '';
    }else{
        $ttlminfeb = number_format($ttlminfeb,0,'.',',');
    }
    if($ttlminmar == 0){
        $ttlminmar = '';
    }else{
        $ttlminmar = number_format($ttlminmar,0,'.',',');
    }
    if($ttlminapr == 0){
        $ttlminapr = '';
    }else{
        $ttlminapr = number_format($ttlminapr,0,'.',',');
    }
    if($ttlminmei == 0){
        $ttlminmei = '';
    }else{
        $ttlminmei = number_format($ttlminmei,0,'.',',');
    }
    if($ttlminjun == 0){
        $ttlminjun = '';
    }else{
        $ttlminjun = number_format($ttlminjun,0,'.',',');
    }
    if($ttlminjul == 0){
        $ttlminjul = '';
    }else{
        $ttlminjul = number_format($ttlminjul,0,'.',',');
    }
    if($ttlminags == 0){
        $ttlminags = '';
    }else{
        $ttlminags = number_format($ttlminags,0,'.',',');
    }
    if($ttlminsep == 0){
        $ttlminsep = '';
    }else{
        $ttlminsep = number_format($ttlminsep,0,'.',',');
    }
    if($ttlminokt == 0){
        $ttlminokt = '';
    }else{
        $ttlminokt = number_format($ttlminokt,0,'.',',');
    }
    if($ttlminnov == 0){
        $ttlminnov = '';
    }else{
        $ttlminnov = number_format($ttlminnov,0,'.',',');
    }
    if($ttlmindes == 0){
        $ttlmindes = '';
    }else{
        $ttlmindes = number_format($ttlmindes,0,'.',',');
    }
    if($ttlmintotal == 0){
        $ttlmintotal = '0';
    }else{
        $ttlmintotal = number_format($ttlmintotal,0,'.',',');
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
                                <td class="table-secondary"><b>Makanan</b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmkjan; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmkfeb; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmkmar; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmkapr; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmkmei; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmkjun; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmkjul; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmkags; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmksep; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmkokt; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmknov; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmkdes; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmktotal; ?></b></td>
                            </tr>
                            <?php echo $htmlmakanan; ?>
                            <tr>
                                <td class="table-secondary"><b>Minuman</b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminjan; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminfeb; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminmar; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminapr; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminmei; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminjun; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminjul; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminags; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminsep; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminokt; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlminnov; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmindes; ?></b></td>
                                <td class="table-secondary" style="text-align: right;width: 75px;"><b><?php echo $ttlmintotal; ?></b></td>
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