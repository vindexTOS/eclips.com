<?php

class App
{
    //დეფაულტ კონტორლერი და მეთოდი
    private $controller = 'home';
    private $method = 'index';
    private $params = [];

    // __კონსტრუქტორი არის დეფაულტ ფუნქცია და დეფაულტ ფუნქციად გადის ინდქს.პჰპ ში როდესაც public ფოლდერში გადავალთ
    public function __construct()
    {
        /// splitURL ფუნქცია მოგვავქს იგივე კლასიდან ამიტომაც ვიყენებთ $this  ვანიჭებთ მის რეთურნს $url ვარიაბლეს და შემდეგ გაგვაქვს show ფუნცქიაში
        //show ფუნქცია შემოგვავქვს functions.php იდან, რახან ორივე ფაილი დაიმპორტებულია init.php-ში წვდომა აქვთ ერთმანეთის ფუცნქიებთან თუ კლასებთან
        $url = $this->splitURL();

        // დინამიურად ვამოწმებთ ფიალის სახელს, იმის მიხედვით თუ რას ჩაწერეენ URL-ში
        //strtoLower რომ რა ასოებიც არ უნდა ჩაწეროს მომხარებელმა აპლიკაცია მიხვდეს რაზა საუბარი
        if (file_exists('../app/controllers/' . strtoLower($url[0]) . '.php')) {
            // თუ url არსებობს controller ვანიჭებთ ამ url ის სახელს
            // echo $url[0];
            $this->controller = strtoLower($url[0]);
            unset($url[0]);
        } else {
            // If the controller file doesn't exist, redirect to the 404 page
            include '../app/views/404.php';
            exit();
        }
        //მოგვაქვს controller ფაილი , თუ $url[0] ცარიელია , პირდაპირ დეფაულტ ფაილს წამოვიღებთ
        require '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller();

        //თუ მეთოდი არსებობს 1 არაიში, ანუ მეორე სლეში ნიშნავს მეთოდს კლასის შემდეგ მოსულს
        if (isset($url[1])) {
            // კონტროლერი არის კლასი, ანუ ობიექტი , ხოლორ url[1] არის მეთოდი რომელიც შემოგვავქვს
            if (method_exists($this->controller, $this->method)) {
                call_user_func_array(
                    [$this->controller, $this->method],
                    $this->params
                );
            } else {
                // If the method doesn't exist, redirect to the 404 page
                $this->controller->index();
            }
        }

        //show ფუნცქის დასასრულს შედეგის სანახავად
        // show($url);

        //მორჩენილ url პარამეტრეს ვატარებთ param-ში
        $this->params = array_values($url);
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    private function splitURL()
    {
        // public/.htaccess ში ვაკონფიგირებთ რომ url ამოიღოს სწორად, შემდეგ ექპლოუდს ვუკეთებთ და / მიხედვით ვყოფთ თითო urlფოინთს
        // ტრიმს ვუკეთებთ რადგან თუ ბოლოში / გვაქვს ის რომ მოაშოროს
        // FILTER_SANITIZE_URL ინფუთ სკრიპტინგის უსაფრთხოების მიზნით
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        return explode('/', filter_var(trim($url, '/'), FILTER_SANITIZE_URL));
    }
}

//   კლასი/მეთოდი   ასე იყოფა url პირველი სლეში იქნება კლასი და მეორე სლაში იქენბა ამ კლასის მეთოდი ანუ ფუნქცია

// პირველ რიგში იპოვნე კლასსი და როცა იპოვნი კლას გაუშვი მეთოდი რომელიც დაფიქირდა  ამ ყველაფერს გავაკეთებთ controllers ფოლდერში  home.php
