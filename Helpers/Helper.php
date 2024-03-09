<?php

if(!function_exists("isTeamOwner")) {
    function isTeamOwner($team) {
        if($team->user_id == Auth::user()->id) {
            return true;
        }
        return false;
    }
}
