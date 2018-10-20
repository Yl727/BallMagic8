<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

/**
 * Iniciara al principio del bot
 */
$botman->hears('/start', function ($bot) {
    $bot->reply('Vamos a ver tu destino');
});


/**
 * Aqui estaran todas la opciones de respuesta
**/
function getArray(){
    return array(
        "En mi opinión, sí", 
        "Es cierto",
        "Es decididamente asi", 
        "Probablemente",
        "Buen pronóstico",
        "Todo apunta a que sí",
        "Sin duda",
        "Sí",
        "Sí definitivamente",
        "Debes confiar en ello",
        "Respuesta vaga, vuelve a intentarlo",
        "Pregunta en otro momento",
        "Será mejor que no te lo diga ahora",
        "No puedo predecirlo ahora",
        "Concéntrate y vuelve a preguntar",
        "No cuentes con ello",
        "Mi respuesta es no",
        "Mis fuentes me dicen que no",
        "Las perspectivas no son buenas",
        "Muy dudoso",
    );
}
/**
 * Mostrara los comandos 
 */
$botman->hears('Ayuda', function ($bot) {
    $bot->reply('Debes realizar una pregunta, recuerda las preguntas siempre termininan con el simbolo ?');
});
/**
 * 
 */
$botman->hears('\¿{pregunta}\?', function ($bot,$pregunta) {
    
    $array=getArray();
    $respuesta=rand(0,20);
    $bot->reply($array[$respuesta]);
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
$botman->fallback( function ($bot) {
    $bot->reply('Que pregunta quieres hacer escribela');
});