<?php

namespace App\Services;

use App\Services\Service;
use Illuminate\Support\Facades\Mail;
/**
 * Responsible for the Mails business rules
 *
 * @author moreira
 */
class MailService extends Service {
    
    /**
     * Send a email 
     * @param string $title The title that will be displayed 
     * @param string $content The content that will be displayed 
     * @param string $to The recipient's email address 
     * @return bool Returns true if the email was sent
     */
    public function send(string $title, string $content, string $to, string $subject = 'Desafio'): bool 
    {
        try {
            Mail::send(
                'emails.send', 
                ['title' => $title, 'content' => $content], 
                function ($message) use ($to, $subject) {
                    $message->subject($subject);
                    $message->from(
                        'noreply@challenge.nice-company-with-hard-name.com', 
                        'Desafio da empresa maneira com nome difícil'
                    );

                    $message->to($to);
                }
            );
            
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
