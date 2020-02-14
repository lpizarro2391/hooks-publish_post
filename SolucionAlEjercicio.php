<?php
function notifica_al_autor( $ID, $post ) {
    $autor = $post->post_author; /* ID del autor */
    $nombre = get_the_author_meta( 'display_name', $autor );
    $email = get_the_author_meta( 'user_email', $autor );
    $titulo = $post->post_title;
    $enlace = get_permalink( $ID );
    $destinatario[] = sprintf( '%s <%s>', $nombre, $email );
    $asunto = sprintf( 'Entrada Publicada: %s', $titulo );
    $mensaje = sprintf ('¡Felicidades, %s! Tu entrada “%s” has sido publicada.' . "\n\n", $nombre, $titulo );
    $mensaje .= sprintf( 'Ver: %s', $enlace );
    $cabeceras[] = '';
    wp_mail( $destinatario, $asunto, $mensaje, $cabeceras );
}
add_action( 'publish_post', 'notifica_al_autor', 10, 2 );
?>
