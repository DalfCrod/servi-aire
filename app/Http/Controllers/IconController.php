<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IconController extends Controller
{
    public function getIcons()
    {
        // Lista de íconos de FontAwesome (puedes agregar o quitar íconos según sea necesario)
        $icons = [
            '', 'fa-address-book', 'fa-address-card', 'fa-angry', 'fa-arrow-alt-circle-down', 'fa-arrow-alt-circle-left',
            'fa-arrow-alt-circle-right', 'fa-arrow-alt-circle-up', 'fa-bell', 'fa-bell-slash', 'fa-bookmark',
            'fa-building', 'fa-calendar', 'fa-calendar-alt', 'fa-calendar-check', 'fa-calendar-minus', 'fa-calendar-plus',
            'fa-calendar-times', 'fa-caret-square-down', 'fa-caret-square-left', 'fa-caret-square-right', 'fa-caret-square-up',
            'fa-chart-bar', 'fa-check-circle', 'fa-check-square', 'fa-circle', 'fa-clipboard', 'fa-clock', 'fa-clone',
            'fa-closed-captioning', 'fa-comment', 'fa-comment-alt', 'fa-comment-dots', 'fa-comments', 'fa-compass',
            'fa-copy', 'fa-copyright', 'fa-credit-card', 'fa-dizzy', 'fa-dot-circle', 'fa-edit', 'fa-envelope', 'fa-envelope-open',
            'fa-eye', 'fa-eye-slash', 'fa-file', 'fa-file-alt', 'fa-file-archive', 'fa-file-audio', 'fa-file-code', 'fa-file-excel',
            'fa-file-image', 'fa-file-pdf', 'fa-file-powerpoint', 'fa-file-video', 'fa-file-word', 'fa-flag', 'fa-flushed',
            'fa-folder', 'fa-folder-open', 'fa-frown', 'fa-frown-open', 'fa-futbol', 'fa-gem', 'fa-grimace', 'fa-grin',
            'fa-grin-alt', 'fa-grin-beam', 'fa-grin-beam-sweat', 'fa-grin-hearts', 'fa-grin-squint', 'fa-grin-squint-tears',
            'fa-grin-stars', 'fa-grin-tears', 'fa-grin-tongue', 'fa-grin-tongue-squint', 'fa-grin-tongue-wink', 'fa-grin-wink',
            'fa-hand-lizard', 'fa-hand-paper', 'fa-hand-peace', 'fa-hand-point-down', 'fa-hand-point-left', 'fa-hand-point-right',
            'fa-hand-point-up', 'fa-hand-rock', 'fa-hand-scissors', 'fa-hand-spock', 'fa-handshake', 'fa-hdd', 'fa-heart',
            'fa-hospital', 'fa-hourglass', 'fa-id-badge', 'fa-id-card', 'fa-image', 'fa-images', 'fa-keyboard', 'fa-kiss',
            'fa-kiss-beam', 'fa-kiss-wink-heart', 'fa-laugh', 'fa-laugh-beam', 'fa-laugh-squint', 'fa-laugh-wink', 'fa-lemon',
            'fa-life-ring', 'fa-lightbulb', 'fa-list-alt', 'fa-map', 'fa-meh', 'fa-meh-blank', 'fa-meh-rolling-eyes',
            'fa-minus-square', 'fa-money-bill-alt', 'fa-moon', 'fa-newspaper', 'fa-object-group', 'fa-object-ungroup',
            'fa-paper-plane', 'fa-pause-circle', 'fa-play-circle', 'fa-plus-square', 'fa-question-circle', 'fa-registered',
            'fa-sad-cry', 'fa-sad-tear', 'fa-save', 'fa-share-square', 'fa-smile', 'fa-smile-beam', 'fa-smile-wink', 'fa-snowflake',
            'fa-square', 'fa-star', 'fa-star-half', 'fa-sticky-note', 'fa-stop-circle', 'fa-sun', 'fa-surprise', 'fa-thumbs-down',
            'fa-thumbs-up', 'fa-times-circle', 'fa-tired', 'fa-trash-alt', 'fa-user', 'fa-user-circle', 'fa-window-close', 'fa-window-maximize',
            'fa-window-minimize', 'fa-window-restore'
        ];

        return response()->json($icons);
    }
}
