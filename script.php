<?php

/*--
    CODE LEGEND :
    =============
    DPRI/YZ                 --> DPRIYZ
    VISA/BIO                --> VISABIO
    VISA/DOCS               --> VISADOCS
    IZIN TINGGAL/BIO        --> IZTIBIO
    IZIN TINGGAL/DOCS       --> IZTIDOCS
    BMS/BIO                 --> BMSBIO
    BMS/TRAX                --> BMSTRAX
    etc..

    TYPE LEGEND :
    =============
    JAKARTA COUNT   --> JKT
    BALI COUNT      --> BLI
    DIFF RESULT     --> DIFF

    DATE FORMAT :
    =============
    YYYYMMDD        --> 20190123

    EXAMPLE COMBINATION :
    =================
    /DPRI/YZ for jakarta at 2019-january-23
    JKT_DPRIYZ_20190123.log
    
    /VISA/DOCS for BALI at 2019-february-21
    BLI_VISADOCS_20190221.log

**/   


class dataSync
{
    public $group1 = array("YZ","X3","X2","ZA","X1","VB","UD","TG","TD","TC","TB","VBK1","SB","S1","VEK1","RB","YA","QB","PI","PC","PB","MT","ME","UA","M1","LY","LFK1","XB","LE","LD","MZ","LB","KH","KG","KF","MB","KE","KD","QC","KC","KB","LZ","JY","JV","JC","SG","JB","JF","J2","RD","HD","GY","UC","GX","GD","GC","GB","G3","LF","GZ","G2","G1","FZ","FF","FD","FC","HC","FB","TE","EZ","EF","J1","EE1","EC12","MD","E1","MC","EC","DF","DE","EE","DC","DB","VD","D1K1","CZ","CY","SC","CX","CW","JD","HE","CI","TF","CH","EB","CG","UAK1","CF","CE","CD1","HEK1","EC11","CD","CB","C1K1","BZ","BN","BL","BK","BJ","BG","G3K1","BF","BE","JE","BC","BB","B9","S2","FE","B4","B1","AY","PZ","LC","AT","BH","AM","AL","LEK1","AK","AJ1","AJ","AHK1","AH1","LG","AH","KF1","AG","AF","RC","HB","AE","ED","AD2","RE","AD1","BD","AD","C1","AC1","JW","BM","AC","AB","VE","3B","4A","3A","1BK1","3C","1B","DD","CC","1A");
    
    public $code = array("DPRIYZ","DPRIX3","DPRIX2","DPRIZA","DPRIX1","DPRIVB","DPRIUD","DPRITG","DPRITD","DPRITC","DPRITB","DPRIVBK1","DPRISB","DPRIS1","DPRIVEK1","DPRIRB","DPRIYA","DPRIQB","DPRIPI","DPRIPC","DPRIPB","DPRIMT","DPRIME","DPRIUA","DPRIM1","DPRILY","DPRILFK1","DPRIXB","DPRILE","DPRILD","DPRIMZ","DPRILB","DPRIKH","DPRIKG","DPRIKF","DPRIMB","DPRIKE","DPRIKD","DPRIQC","DPRIKC","DPRIKB","DPRILZ","DPRIJY","DPRIJV","DPRIJC","DPRISG","DPRIJB","DPRIJF","DPRIJ2","DPRIRD","DPRIHD","DPRIGY","DPRIUC","DPRIGX","DPRIGD","DPRIGC","DPRIGB","DPRIG3","DPRILF","DPRIGZ","DPRIG2","DPRIG1","DPRIFZ","DPRIFF","DPRIFD","DPRIFC","DPRIHC","DPRIFB","DPRITE","DPRIEZ","DPRIEF","DPRIJ1","DPRIEE1","DPRIEC12","DPRIMD","DPRIE1","DPRIMC","DPRIEC","DPRIDF","DPRIDE","DPRIEE","DPRIDC","DPRIDB","DPRIVD","DPRID1K1","DPRICZ","DPRICY","DPRISC","DPRICX","DPRICW","DPRIJD","DPRIHE","DPRICI","DPRITF","DPRICH","DPRIEB","DPRICG","DPRIUAK1","DPRICF","DPRICE","DPRICD1","DPRIHEK1","DPRIEC11","DPRICD","DPRICB","DPRIC1K1","DPRIBZ","DPRIBN","DPRIBL","DPRIBK","DPRIBJ","DPRIBG","DPRIG3K1","DPRIBF","DPRIBE","DPRIJE","DPRIBC","DPRIBB","DPRIB9","DPRIS2","DPRIFE","DPRIB4","DPRIB1","DPRIAY","DPRIPZ","DPRILC","DPRIAT","DPRIBH","DPRIAM","DPRIAL","DPRILEK1","DPRIAK","DPRIAJ1","DPRIAJ","DPRIAHK1","DPRIAH1","DPRILG","DPRIAH","DPRIKF1","DPRIAG","DPRIAF","DPRIRC","DPRIHB","DPRIAE","DPRIED","DPRIAD2","DPRIRE","DPRIAD1","DPRIBD","DPRIAD","DPRIC1","DPRIAC1","DPRIJW","DPRIBM","DPRIAC","DPRIAB","DPRIVE","DPRI3B","DPRI4A","DPRI3A","DPRI1BK1","DPRI3C","DPRI1B","DPRIDD","DPRICC","DPRI1A","VISABIO","VISADOCS","CEKAL","DETENI","MOBILE","NYIDDAKIM","IZTIBIO","IZTIDOCS","BMSBIO","BMSTRAX");

    public $basic = array("JKT"=>"","BLI"=>"","DIFF"=>"");

    private $path;
    public $currentDate;

    function __construct()
    {
        $this->currentDate = date('Ymd');
    }

    function setPath($str)
    {
        $this->path = $str;
    }

    function getValue($type,$code)
    {
        $filename = $type . "_" . $code . "_" . $this->currentDate . ".log";

        if (file_exists($this->path . $filename))
        {
            $count = file($this->path . $filename);
            $count = intval($count[0]);

            if (is_numeric($count))
            {
                return $count;
            }
            else{
                return "(Invalid count)";
            }
        }else{
            return "(log not yet posted!)";
        }
    }

    function getSyncStatus($code)
    {
        $filename = "DIFF_" . $code . "_" . $this->currentDate . ".log";

        if(file_exists($this->path . $filename))
        {
            $count = file($this->path . $filename);
            if (empty($count[0]))
            {
                return '<td class="text-center"><span class="badge badge-success">Sync</span></td>';    
            }
            else
            {
                return '<td class="text-center"><span class="badge badge-danger">Not Sync</span></td>';
            }
        }
        else
        {
            return '<td class="text-center"><span class="badge badge-warning">log not yet posted</span></td>';
        }
    }
}
?>