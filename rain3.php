<?php
$frames = ['|', '/', '-', '\\']; // Кадры вращения
while (TRUE) {
    foreach ($frames as $frame) {
        // Вычисляем оставшееся время

        // Формируем строку таймера
        echo "\r[{$frame}] Processing...";

        // Задержка для анимации
        usleep(100000); // 100 мс
    } 
} 

echo "\r\033[K";

echo "✅ Task completed successfully!\n";

?>