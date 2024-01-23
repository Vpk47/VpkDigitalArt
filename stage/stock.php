<?php

$apiKey = 'HSB3XOR16VRKVEJS'; // Replace with your Alpha Vantage API Key
$symbol = 'AAPL'; // Replace with your desired stock symbol

function getStockData($symbol, $apiKey) {
    $api_url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=$symbol&interval=5min&apikey=$apiKey";
    $response = file_get_contents($api_url);
    return json_decode($response, true);
}

function isBullishEngulfing($data, $volumeThreshold) {
    // Extract last two data points
    $dataPoints = array_slice($data, -2, 2);

    if (count($dataPoints) < 2) {
        return false; // Not enough data
    }

    $previousDay = array_values($dataPoints)[0];
    $currentDay = array_values($dataPoints)[1];

    $bullishEngulfing = $currentDay['4. close'] > $currentDay['1. open']
                        && $previousDay['4. close'] < $previousDay['1. open']
                        && $currentDay['4. close'] > $previousDay['1. open']
                        && $currentDay['1. open'] < $previousDay['4. close'];

    $highVolume = $currentDay['5. volume'] > $volumeThreshold;

    return $bullishEngulfing && $highVolume;
}

function checkTradingSuggestions($symbol, $apiKey) {
    $stockData = getStockData($symbol, $apiKey);
    $timeSeries = $stockData['Time Series (5min)'] ?? [];

    // Define a volume threshold (this is arbitrary, adjust based on your analysis)
    $volumeThreshold = 50000; 

    if (isBullishEngulfing($timeSeries, $volumeThreshold)) {
        return "Bullish Engulfing pattern with high volume detected. Consider buying.";
    } else {
        return "No trading suggestion at the moment.";
    }
}

$suggestion = checkTradingSuggestions($symbol, $apiKey);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Stock Trading Suggestions</title>
</head>
<body>
    <h1>Trading Suggestion for <?php echo htmlspecialchars($symbol); ?></h1>
    <p><?php echo htmlspecialchars($suggestion); ?></p>
</body>
</html>
