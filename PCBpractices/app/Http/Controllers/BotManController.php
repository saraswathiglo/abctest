<?php



namespace App\Http\Controllers;



use BotMan\BotMan\BotMan;

use Illuminate\Http\Request;

use BotMan\BotMan\Messages\Incoming\Answer;

use BotMan\BotMan\Middleware\ApiAi;



class BotManController extends Controller
{

    /**

     * Place your BotMan logic here.

     */

    public function handle()

    {
      $botman = app('botman');





       $botman->hears('hello', function (BotMan $bot) {
            $this->replyhello($bot);
       });

        $botman->hears('hi|hii|hiii', function (BotMan $bot) {

            $this->askName($bot);
        });
        $botman->hears('call me {name}', function ($bot, $name) {
            $bot->reply('Your name is: '.$name);
        });

        $botman->hears('hey', function (BotMan $bot) {

            $bot->typesAndWaits(2);
            $bot->reply('yah!i\'m here <img height="70px" src="/images/robot/logorobot.png" id="image" width="auto">');

        });
        $botman->hears('i love you|i want you|i will kiss you|i love u', function (BotMan $bot) {
            $bot->reply('What the ... <img height="70px" src="/images/robot/siderobot.png" id="image" width="auto">');
        });

        $botman->hears('what is ICST|what is icst|icst|icst?', function (BotMan $bot) {
            $bot->reply('Indian Centre for Social Transformation (Indian CST) is a registered Public Charitable Trust (Registration No. HLS-4-00228-2009-10 dated 26/12/2009) whose mission is to work towards realisation of a national vision set out in Article 51A (j) of the Indian Constitution- which prescribes the Fundamental Duty for Indian Citizens and exhorts them “to strive towards excellence in all spheres of individual and collective activity so that the nation constantly rises to higher levels of endeavour and achievement.” The goal of Indian CST is to promote through this one stop portal, a number of projects that will deliver cost effective computing, best practices, knowledge management systems and critical applications at affordable costs to masses across India. Indian CST truly believes in \'IT for Social Change\'. ');
            $bot->reply('You can find more at <a href="https://indiancst.com/India/Citizen/login/index.php" target="_blank">Indian CST</a>');
        });
        $botman->hears('call me {name}', function ($bot, $name) {
            $bot->reply('Your name is: '.$name);
        });
        $botman->hears('keyword', function (BotMan $bot) {

            $bot->reply("Tell me more!");
        });
        $botman->hears('I want ([0-9]+)', function ($bot, $number) {
            $bot->reply('You will get: '.$number);
        });
        $botman->hears('Ask a Question', function ($bot) {
            $bot->reply('Click here to redirect<a href="http://183.82.110.22:8001/askquest" target="_blank"> Ask a Question</a>');

        });
        $botman->fallback(function($bot) {
            $bot->reply('Sorry, I did not understand what you are asking.');
        });

//        $botman->hears('{message}', function($botman, $message) {
//                    $botman->reply("Sorry didn't understand what u say!");
//        });
        $botman->listen();



    }



    /**

     * Place your BotMan logic here.

     */

    public function askName($botman)
    {
             $botman->ask('Hello! What is your Name?', function(Answer $answer) {
             $name = $answer->getText();
             $this->say('Nice to meet you '.$name);

        });

    }
    public function replyhello($botman)
    {

        $botman->ask('Hello!!!!May I know your name?', function(Answer $answer) {
        $name = $answer->getText();
        $this->say('Nice to meet you '.$name);

        });

    }
    public function askPhoto()
    {
        $this->askForImages('Please upload an image.', function ($images) {
            //
        });
    }
}