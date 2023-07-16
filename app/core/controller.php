<?php

class Controller
{
    protected function view($view, $data = [])
    {
        //views ფოლდერში ვეძებთ ფაილს, თუ არსებობს ის ფაილი ვაბრუნებთ
        if (file_exists('../app/views/' . $view . '.php')) {
            // echo $view;
            include '../app/views/' . $view . '.php';
        } else {
            //თუ ფეიჯი არ არსებობს დავაბურნებთ 404 ფეიჯს
            include '../app/views/404.php';
        }
    }
}
