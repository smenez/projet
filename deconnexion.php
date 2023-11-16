<?php
require_once('libs/session.php');
session_destroy();
header('location: index.php');
