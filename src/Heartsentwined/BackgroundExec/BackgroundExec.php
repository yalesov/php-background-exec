<?php
namespace Heartsentwined\BackgroundExec;

class BackgroundExec
{
    /**
     * close a client HTTP connection
     * and start (continue) script execution in background
     *
     * @return void
     */
    public static function start()
    {
        try {
            ob_end_clean();
            header('Connection: close;');
            header('Content-Encoding: none;');
            ignore_user_abort(true); // optional
            ob_start();
            //echo ('Text user will see');
            $size = ob_get_length();
            header("Content-Length: $size;");
            ob_end_flush();     // Strange behaviour, will not work
            flush();            // Unless both are called !
            ob_end_clean();
            //echo('Text user will never see');
        } catch (\Exception $e) {
        }
    }
}
