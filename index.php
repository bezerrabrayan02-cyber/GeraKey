<?php

/**
 * Função para gerar uma Key aleatória.
 * * @param int $comprimentoSegmento O número de caracteres em cada bloco (padrão: 4).
 * @param int $quantidadeSegmentos O número de blocos separados por hífen (padrão: 4).
 * @return string A key gerada.
 */
function gerarChaveAleatoria($comprimentoSegmento = 4, $quantidadeSegmentos = 4) {
    // Caracteres permitidos na Key (Letras maiúsculas e números, sem caracteres confusos como O e 0 se preferir, mas aqui usei todos)
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $totalCaracteres = strlen($caracteres) - 1;
    $chave = [];

    for ($i = 0; $i < $quantidadeSegmentos; $i++) {
        $segmento = '';
        for ($j = 0; $j < $comprimentoSegmento; $j++) {
            // random_int é criptograficamente mais seguro do que rand() ou mt_rand()
            $indexAleatorio = random_int(0, $totalCaracteres);
            $segmento .= $caracteres[$indexAleatorio];
        }
        $chave[] = $segmento;
    }

    // Junta os segmentos usando um hífen
    return implode('-', $chave);
}

// ==========================================
// Exemplos de Uso
// ==========================================

// 1. Gera uma key no formato padrão: XXXX-XXXX-XXXX-XXXX
$keyPadrao = gerarChaveAleatoria();
echo "Key Padrão: " . $keyPadrao . "\n";

// 2. Gera uma key mais longa: XXXXX-XXXXX-XXXXX-XXXXX-XXXXX (5 blocos de 5 caracteres)
$keyLonga = gerarChaveAleatoria(5, 5);
echo "Key Longa: " . $keyLonga . "\n";

// 3. Gera uma key simples sem hifens: XXXXXXXXXXXX (1 bloco de 12 caracteres)
$keySimples = gerarChaveAleatoria(12, 1);
echo "Key Simples: " . $keySimples . "\n";

?>
