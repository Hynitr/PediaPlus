<?php
require_once("dbcontroller.php");
require_once("pagination.class.php");
$db_handle = new DBController();
$perPage = new PerPage();

$sql = "SELECT * FROM pdf WHERE `approve` = 'Yes' AND `dwnld` BETWEEN 0 AND 4 ORDER BY id desc";
$paginationlink = "latest.php?page=";	
$pagination_setting = $_GET["pagination_setting"];
				
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}

if($pagination_setting == "prev-next") {
	$perpageresult = $perPage->getPrevNext($_GET["rowcount"], $paginationlink,$pagination_setting);	
} else {
	$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);	
}


$output = '';
foreach($faq as $k=>$v) {
 $output .= '<div row class="col-md-4 col-lg-4 mb-4 mb-lg-4">
                            <div class="h-entry">
                                <div class="h-entry-inner">
                                    <a href="./preview?pdf= '.$faq[$k]['pedia'].'"><img src="images/pdff.png" alt="pdf image" class="img-fluid"></a>
                                    <h2 style="color: #ff0000" class="font-size-regular font-weight-bold">
                                        '.$faq[$k]['title'].'
                                    </h2>
                                    <div style="color: #000" class="meta mb-4">Uploaded by <a
                                            href="./'.$faq[$k]['upld'].'>'.$faq[$k]['upld'].'

                             //verification tick


                         
                                        </a>
                                        <span class="mx-2">&bullet;</span>'.$faq[$k]['code'].'<br />
                                        <span class="mx-2">&bullet;</span>'.$faq[$k]['level'].'
                                        <span class="mx-2">&bullet;</span>'.$faq[$k]['dept'].'
                                        <span class="mx-2">&bullet;</span>'.$faq[$k]['dwnld'].'
                                        Downloads
                                        <br /><br />
                                        <span class="mx-2"><a target="_blank" data-media="images/ico.png"
                                                href="https://twitter.com/home?status=https://dotpedia.com.ng/preview?pdf='.$faq[$k]['pedia'].'"><i
                                                    class="icon-twitter"></i></a></span>
                                        <span class="mx-2"><a target="_blank" data-media="images/ico.png"
                                                href="https://facebook.com/sharer.php?u=https://dotpedia.com.ng/preview?pdf='.$faq[$k]['pedia'].'"><i
                                                    class="icon-facebook"></i></a></span>
                                        <span class="mx-2"><a target="_blank" data-action="share/whatsapp/share"
                                                data-media="images/ico.png"
                                                href="https://api.whatsapp.com/send?text=Read/Download *'.ucwords($faq[$k]['title']).'* via: https://dotpedia.com.ng/preview?pdf='. $faq[$k]['pedia'].' - *Uploaded by: '.$faq[$k]['upld'].'*"><i
                                                    class="icon-whatsapp"></i></a></span>
                                    </div>



                                    <div class="col-md-12 ">
                                        <a href="./preview?pdf='.$faq[$k]['pedia'].'"><input
                                                style="width: 100%; background: #FFE9E6; color: #ff0000;" type="submit"
                                                value="Preview/Download" class="btn btn-pill btn-md "></a><br />
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
';

}
if(!empty($perpageresult)) {
$output .= '<div id="pagination" style="color:#ea728c" class="col-lg-12 text-center">' . $perpageresult . '</div>';
}
print $output;
?>
