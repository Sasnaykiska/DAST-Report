document.addEventListener("DOMContentLoaded", () => {
    // Регулярные выражения для поиска 
    const pgSleepPattern = /pg_sleep\(6\)/g;
    const waitForDelayPattern = /WAITFOR DELAY/g;
    const selectPattern = /select/g;
    const tsqlidslPattern = /tsqlidsl/g;
    const SELECTPattern = /SELECT/g;
    const arraySortPattern = /arraySort/g;
    const sleepPattern = /sleep/g;
    const pingPattern = /ping/g;
    const BadRequestPattern = /400 Bad Request/g;



    // Стиль подсветки для каждого типа
    const pgSleepHighlight = `<span style="background-color: white; color: red; font-weight: bold;">pg_sleep(6)</span>`;
    const waitForDelayHighlight = `<span style="background-color: white; color: red; font-weight: bold;">WAITFOR DELAY</span>`;
    const selectHighlight = `<span style="background-color: white; color: red; font-weight: bold;">select</span>`;
    const tsqlidslHighlight = `<span style="background-color: white; color: red; font-weight: bold;">tsqlidsl</span>`;
    const SELECTlHighlight = `<span style="background-color: white; color: red; font-weight: bold;">SELECT</span>`;
    const arraySortHighlight = `<span style="background-color: white; color: red; font-weight: bold;">arraySort</span>`;
    const sleepHighlight = `<span style="background-color: white; color: red; font-weight: bold;">sleep</span>`;
    const pingHighlight = `<span style="background-color: white; color: red; font-weight: bold;">sleep</span>`;
    const BadRequestHighlight = `<span style="background-color: white; color: red; font-weight: bold;">400 Bad Request</span>`;




    const tableCells = document.querySelectorAll("td");
    tableCells.forEach((cell) => {
        if (pgSleepPattern.test(cell.innerHTML)) {
            cell.innerHTML = cell.innerHTML.replace(pgSleepPattern, pgSleepHighlight);
        }

        if (waitForDelayPattern.test(cell.innerHTML)) {
            cell.innerHTML = cell.innerHTML.replace(waitForDelayPattern, waitForDelayHighlight);
        }

        if (selectPattern.test(cell.innerHTML)) {
            cell.innerHTML = cell.innerHTML.replace(selectPattern, selectHighlight);
        }

        if (tsqlidslPattern.test(cell.innerHTML)) {
            cell.innerHTML = cell.innerHTML.replace(tsqlidslPattern, tsqlidslHighlight);
        }

        if (SELECTPattern.test(cell.innerHTML)) {
            cell.innerHTML = cell.innerHTML.replace(SELECTPattern, SELECTlHighlight);
        }

        if (arraySortPattern.test(cell.innerHTML)) {
            cell.innerHTML = cell.innerHTML.replace(arraySortPattern, arraySortHighlight);
        }

        if (sleepPattern.test(cell.innerHTML)) {
            cell.innerHTML = cell.innerHTML.replace(sleepPattern, sleepHighlight);
        }

        if (pingPattern.test(cell.innerHTML)) {
            cell.innerHTML = cell.innerHTML.replace(pingPattern, pingHighlight);
        }

        if (BadRequestPattern.test(cell.innerHTML)) {
            cell.innerHTML = cell.innerHTML.replace(BadRequestPattern, BadRequestHighlight);
        }
    });
});
