<?php
class Msg extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function set($text, $title="Üzenet!", $class="")
    {
        $_SESSION['msg'] = array('title' => $title, 'text' => $text, 'class' => $class, 'time' => date("H:i:s"));
    }
    public function get()
    {
        $html = '';
        if(@$_SESSION['msg'])
        {
            $html.= '<div class="mb-3 text-' . $_SESSION['msg']['class'] . '">' . $_SESSION['msg']['text'] .'</div>';
            unset($_SESSION['msg']);
        };
        return $html;
    }
    public function get_all()
    {
        $html = '';
        if(@$_SESSION['msg']){
            $html .= '
                <div class="toast '.$_SESSION['msg']['class'].' show position-fixed top-5 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" delay="5000">
                    <div class="toast-header">
                        <strong class="me-auto" id="msgTitle">'.$_SESSION['msg']['title'].'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Bezárás"></button>
                    </div>
                    <div class="toast-body" id="msgBody">
                        '.$_SESSION['msg']['text'].'
                    </div>
                </div>';
            unset($_SESSION['msg']);
        };
        return $html;
    }
}