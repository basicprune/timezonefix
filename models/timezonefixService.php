<?php

class timezonefixService extends DbService {
public function getTimeZoneTables($id){
    return $this->getObjects('timezonefixInput', ['is_deleted'=>0, 'creator_id'=> $id]);
}

}
