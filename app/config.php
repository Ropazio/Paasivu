<?php

set_timezone();

function set_timezone() : void {
    date_default_timezone_set("Europe/Helsinki");
}