<?php

namespace Cloudways\Notification;

use Illuminate\Support\ServiceProvider;
use Cloudways\Notification\NotificationFacade;
use Cloudways\Notification\Email;
use Cloudways\Notification\Slack;
use Cloudways\Notification\Database;
use PHPMailer\PHPMailer\PHPMailer;
use Jenssegers\Blade\Blade;
use App\Notification;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->singleton(NotificationFacade::class, function ($app) {
            return new NotificationFacade([
                new Email($this->configureEmailClient(), new Blade(
                    base_path('templates/messages'),
                    base_path('templates/cache')
                )), 
                new Slack(),
                new Database(new Notification(), new Blade(
                    base_path('templates/messages'),
                    base_path('templates/cache')
                ))
            ]);
        });
    }

    /**
     * @return PHPMailer
     */
    private function configureEmailClient(): PHPMailer
    {
        $phpMailer = new PHPMailer(true);
        $phpMailer->isSMTP();
        $phpMailer->SMTPDebug = 0;
        $phpMailer->Host = 'smtp.gmail.com';
        $phpMailer->Port = 587;
        $phpMailer->SMTPSecure = 'tls';
        $phpMailer->SMTPAuth = true;
        $phpMailer->Username = "gaditekalerts@gmail.com";
        $phpMailer->Password = "gaditek123";
        $phpMailer->setFrom('alerts@cloudways.com', 'Cloudways Alerts');
        $phpMailer->addReplyTo('do-not-reply@cloudways.com');
        $phpMailer->Subject = 'Cloudways Alerts';

        return $phpMailer;
    }
}