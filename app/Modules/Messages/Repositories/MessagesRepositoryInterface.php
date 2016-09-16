<?php namespace App\Modules\Messages\Repositories;

use App\Modules\Messages\Models\Messages;

interface MessagesRepositoryInterface
{
    public function __construct(Messages $messages);

    public function messengers();

    public function messages( $id, $per_page, $current_page  );
    
    public function getNewMessagesCount( $id );


}