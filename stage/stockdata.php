<?php
$apiKey = 'HSB3XOR16VRKVEJS'; // Replace with your Alpha Vantage API Key
$symbols = [
    'AJRINFRA', 'AKSHOPTFBR', 'ALPSINDUS', 'ANKITMETAL', 'ANSALHSG', 'ANTGRAPHIC', 'BAGFILMS', 'BCP', 
    'BHANDARI', 'BURNPUR', 'CCCL', 'CCHHL', 'CENTEXT', 'COUNCODOS', 'CREATIVEYE', 'DCMFINSERV', 'DNAMEDIA', 
    'EASTSILK', 'ESSARSHPNG', 'ESSENTIA', 'EXCEL', 'FCONSUMER', 'FCSSOFT', 'FEL', 'FELDVR', 'FMNL', 'FRETAIL', 
    'GAL', 'GANGAFORGE', 'GAYAHWS', 'GFSTEELS', 'GLFL', 'GLOBE', 'GODHA', 'GREENPOWER', 'GTL', 'GTLINFRA', 
    'HAVISHA', 'HEALTHY', 'HLVLTD', 'IDEA', 'IFCI', 'IMPEXFERRO', 'INDSWFTLTD', 'INFOMEDIA', 'INVENTURE', 
    'IVC', 'JPASSOCIAT', 'JPINFRATEC', 'JPPOWER', 'KANANIIND', 'KAUSHALYA', 'KAVVERITEL', 'KBCGLOBAL', 
    'KEEPLEARN', 'KRIDHANINF', 'LCCINFOTEC', 'LPDC', 'LYPSAGEMS', 'MADHUCON', 'MBECL', 'MERCATOR', 'MSPL', 
    'MTEDUCARE', 'NAGAFERT', 'NEXTMEDIA', 'NILAINFRA', 'NILASPACES', 'NOIDATOLL', 'OILCOUNTUB', 'PARSVNATH', 
    'PILITA', 'PRAKASHSTL', 'PREMIER', 'PVP', 'RADAAN', 'RCOM', 'REGENCERAM', 'RHFL', 'RKDL', 'ROLLT', 
    'ROLTA', 'RTNPOWER', 'RUCHINFRA', 'SABEVENTS', 'SADBHIN', 'SALSTEEL', 'SAMBHAAV', 'SATHAISPAT', 'SBC', 
    'SCAPDVR', 'SEPC', 'SETUINFRA', 'SHRENIK', 'SICAL', 'SITINET', 'SOMATEX', 'SOUTHBANK', 'SPCENET', 
    'SPTL', 'SREINFRA', 'STAMPEDE', 'SUMEETINDS', 'SUNDARAM', 'SUPERSPIN', 'SUPREMEENG', 'SUVIDHAA', 'SUZLON', 
    'TARAPUR', 'TFL', 'TGBHOTELS', 'TIJARIA', 'TNTELE', 'TVVISION', 'UJAAS', 'UMESLTD', 'UTTAMSTL', 'VIJIFIN', 
    'VIKASECO', 'VIKASLIFE', 'VIKASPROP', 'VISESHINFO', 'VIVIDHA', 'WINPRO', 'ZEELEARN', 'ZENITHSTL'
];

// Fetch stock data for a symbol
function fetchStockData($symbol, $apiKey) {
    $apiUrl = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=$symbol&apikey=$apiKey";
    $response = file_get_contents($apiUrl);
    return json_decode($response, true);
}

// Get the latest stock data for all symbols
function getLatestStockData($symbols, $apiKey) {
    $latestData = [];
    foreach ($symbols as $symbol) {
        $stockData = fetchStockData($symbol, $apiKey);
        if (!empty($stockData['Global Quote'])) {
            $latestData[$symbol] = $stockData['Global Quote'];
        }
    }
    return $latestData;
}

// Check if it's an AJAX request for real-time data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'getLatestData') {
    header('Content-Type: application/json');
    echo json_encode(getLatestStockData($symbols, $apiKey));
    exit;
}

// HTML and JavaScript for initial page load
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Stock Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchLatestData() {
                $.ajax({
                    type: 'POST',
                    url: '', // Current PHP file
                    data: { action: 'getLatestData' },
                    dataType: 'json',
                    success: function(data) {
                        // Update the HTML with the latest stock data
                        $.each(data, function(symbol, quote) {
                            $('#stock-' + symbol).text(symbol + ': $' + quote['05. price']);
                        });
                    },
                    complete: function() {
                        // Schedule the next request
                        setTimeout(fetchLatestData, 30000); // 30 seconds interval
                    }
                });
            }
            fetchLatestData();
        });
    </script>
</head>
<body>
    <h1>Real-Time Stock Data</h1>
    <div id="stock-list">
        <?php foreach ($symbols as $symbol): ?>
            <p id="stock-<?php echo htmlspecialchars($symbol); ?>">Loading...</p>
        <?php endforeach; ?>
    </div>
</body>
</html>
