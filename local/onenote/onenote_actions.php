<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

require_once(__DIR__.'/../../config.php');
require_once('onenote_api.php');

require_login();
$PAGE->set_url('/local/onenote/onenote_actions.php');
$PAGE->set_context(\context_system::instance());

$action = required_param('action', PARAM_TEXT);
$cmid = required_param('cmid', PARAM_INT);
$wantfeedbackpage = optional_param('wantfeedback', false, PARAM_BOOL);
$isteacher = optional_param('isteacher', false, PARAM_BOOL);
$submissionuserid = optional_param('submissionuserid', null, PARAM_INT);
$submissionid = optional_param('submissionid', null, PARAM_INT);
$gradeid = optional_param('gradeid', null, PARAM_INT);

$url = onenote_api::getinstance()->get_page($cmid, $wantfeedbackpage, $isteacher, $submissionuserid, $submissionid, $gradeid);
if ($url) {
    $url = new moodle_url($url);
    redirect($url);
} else {
    throw new moodle_exception('get_onenote_page_failed');
}