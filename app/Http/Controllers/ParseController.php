<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yangqi\Htmldom\Htmldom;
use App\Http\Requests;
use Symfony\Component\DomCrawler\Crawler;

class ParseController extends Controller
{
    protected $data='';
    protected $actors='';
    protected $director='';
    protected $title='';
    protected $original='';
     //protected $massData=array();
    public 	function dat($mm) {

        if ($mm == "January")
            $mm1 = "01";
        if ($mm == "February")
            $mm1 = "02";
        if ($mm == "March")
            $mm1 = "03";
        if ($mm == "April")
            $mm1 = "04";
        if ($mm == "May")
            $mm1 = "05";
        if ($mm == "June")
            $mm1 = "06";
        if ($mm == "July")
            $mm1 = "07";
        if ($mm == "August")
            $mm1 = "08";
        if ($mm == "September")
            $mm1 = "09";
        if ($mm == "October")
            $mm1 = "10";
        if ($mm == "November")
            $mm1 = "11";
        if ($mm == "December")
            $mm1 = "12";
        return $mm1;
    }

    public function parse(Request $request)
    {
      //  if (isset($request->url)) {
$flag=0;
            $url =  $request->url;
           // $url =  'http://www.imdb.com/title/tt1253863/';
            $simpleHTML = new Htmldom();
            $all = $simpleHTML->file_get_html($url);
            foreach ($all->find('//*[@id="title-overview-widget"]/div[2]/div[3]/div[1]/a/img') as $link) {
                $image_sourse = $link->src;
            }
            foreach ($all->find('//*[@id="titleDetails"]/div[4]') as $link) {
                $data = $link->innertext;
            }
            foreach ($all->find('//*[@id="title-overview-widget"]/div[2]/div[2]/div/div[2]/div[2]/h1') as $link) {
                $title = $link->innertext;
                $title = preg_replace('~<span.*<\/span>~', '', $title);
                if (!preg_match('/[а-я]{3,}/iu',$title)){ //Если название нерусское
                echo   $flag=1;
                }else{
                    foreach ($all->find('//*[@id="title-overview-widget"]/div[2]/div[2]/div/div[2]/div[2]/div[1]') as $link) {
                        $original = $link->innertext;
                    }
                }
            }

            $russia = 0;
            $russia = substr_count($data, '(Russia)');
            if ($russia != 0) {
                // echo "Отечественная дата:<br>";
                preg_match('~[[:digit:]]{1,2} [[:alpha:]]{3,9} [[:digit:]]{4}~', $data, $array);
                $date = explode(' ', $array[0]);
                $data = $date[2] . '-' . $this->dat($date[1]) . '-' . $date[0];
            }

                $title = trim($title);
                if ($flag==1){
                    $original=$title;
                }else{
                    $original = preg_replace('~<span.*<\/span>~', '', $original);
                }
                $massData = array('original' => $original,
                    'title' => $title,
                    'data' => $data);
            $original = preg_replace('~[[:punct:]]|[[:space:]]~', '', $original); // очищаем от всякой пунктуации
            $pic = $this->getImage($image_sourse, $original); // добываем изображение
           $massData['image'] = $pic;
           return view('parseFormImdb', ['massData' => $massData]);
    }
        public   function getImage($url, $title_image)
        {
            $image = $url;
            $mini_title = $title_image;
            if (isset($image)) {
                //$mini_title=$original; //название миниатюры
                define('SOURCE', $image);  // адрес исходный файл
                define('TARGET', 'image/' . $mini_title . '.jpg');     // имя файла для "превьюшки"
                define('NEWX', 182);               // ширина "превьюшки"
                define('NEWY', 268);                // высота "превьюшки"
                // Определяем размер изображения с помощью функции getimagesize:
                $size = getimagesize(SOURCE);
                // Функция getimagesize, требуя в качестве своего параметра имя файла,
                // возвращает массив, содержащий (помимо прочего, о чем можно прочитать
                // в документации), ширину - $size[0] - и высоту - $size[1] -
                // указанного изображения. Кстати, для ее использования не требуется наличие
                // библиотеки GD, так как она работает непосредственно с заголовками
                // графических файлов. В случае, если формат файла не распознан, getimagesize
                // возвращает false:
                if ($size === false) die ('Bad image file!');

                // Читаем в память JPEG-файл с помощью функции imagecreatefromjpeg:
                $source = imagecreatefromjpeg(SOURCE)
                or die('Cannot load original JPEG');

                // Создаем новое изображение
                $target = imagecreatetruecolor(NEWX, NEWY);

                // Копируем существующее изображение в новое с изменением размера:
                imagecopyresampled(
                    $target,  // Идентификатор нового изображения
                    $source,  // Идентификатор исходного изображения
                    0, 0,      // Координаты (x,y) верхнего левого угла
                    // в новом изображении
                    0, 0,      // Координаты (x,y) верхнего левого угла копируемого
                    // блока существующего изображения
                    NEWX,     // Новая ширина копируемого блока
                    NEWY,     // Новая высота копируемого блока
                    $size[0], // Ширина исходного копируемого блока
                    $size[1]  // Высота исходного копируемого блока
                );
                // Сохраняем результат в JPEG-файле:
                // Функции генерации графических файлов, такие как imagejpeg,
                // могут выводить результат своей работы не только в броузер,
                // но и в файл. Для этого следует указать имя файла в необязательном
                // втором параметре.
                // Именно функция imagejpeg имеет и третий необязательный параметр -
                // качество изображения. Установим максимальное качество - 100.
                imagejpeg($target, TARGET, 80);
                //$link='http://image.kinopitka.ru/release/previev'.$mini_title.'.jpg';
                $link = 'image/' . $mini_title . '.jpg';
                // Как всегда, не забываем:
                imagedestroy($target);
                imagedestroy($source);
                return $link;
            }
        }
}


