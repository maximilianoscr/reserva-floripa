<?php
class Debug
{
    public static function debug($aImprimir, $file=0, $ver=1)
    {
        if ($ver == 1) {
            if (is_array($aImprimir)) {
                print_r($aImprimir);
            } elseif ($file == 1) {
                echo $aImprimir . "\n";
            } else {
                echo $aImprimir . "\n\n";
            }
        }
        return true;
    }
}
?>
