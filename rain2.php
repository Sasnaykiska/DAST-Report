<?php

function printDustReconstructionLogo() {
    // Логотип
    $logoLines = [
        "██████╗  █████╗ ███████╗████████╗     ██████╗ ███████╗ ██████╗  ██████╗ ████████╗",
        "██╔══██╗██╔══██╗██╔════╝╚══██╔══╝    ██╔═══██╗██╔════╝██╔═══██╗██╔═══██╗╚══██╔══╝",
        "██████╔╝███████║███████╗   ██║       ██║   ██║█████╗  ██║   ██║██║   ██║   ██║   ",
        "██╔═══╝ ██╔══██║╚════██║   ██║       ██║   ██║██╔══╝  ██║   ██║██║   ██║   ██║   ",
        "██║     ██║  ██║███████║   ██║       ╚██████╔╝███████╗╚██████╔╝╚██████╔╝   ██║   ",
        "╚═╝     ╚═╝  ╚═╝╚══════╝   ╚═╝        ╚═════╝ ╚══════╝ ╚═════╝  ╚═════╝    ╚═╝   ",
    ];

$dustSymbols = ["░", "▒", "▓", ".", "$", "@", "&", "#"]; // Символы пыли
$speed = 105000; // Скорость анимации (в микросекундах)

// Основной цикл
for ($frame = count($logoLines) - 1; $frame >= 0; $frame--) {
    // Очистка экрана
    echo "\033[H\033[J";
    foreach ($logoLines as $lineIndex => $line) {
        if ($lineIndex > $frame) {
            // Строки ниже текущего кадра полностью отображаются
            echo $line . "\n";
        } else {
            // Строки "вырастают" из пыли
            $dustLine = preg_replace_callback(
                "/./",
                function ($matches) use ($dustSymbols) {
                    // Вероятность проявления оригинального символа
                    return (rand(0, 100) > 70) ? $matches[0] : $dustSymbols[array_rand($dustSymbols)];
                },
                $line
            );
            echo $dustLine . "\n";
        }
    }

    usleep($speed); // Задержка анимации
}

// Финальное появление четкого логотипа
echo "\033[H\033[J";
foreach ($logoLines as $line) {
    echo $line . "\n";
}
echo "\n✨ v1.0 ✨\n";
echo "\n \n";
echo "123 \n";
echo file_get_contents ("morphie.gif");
}

printDustReconstructionLogo();
?>