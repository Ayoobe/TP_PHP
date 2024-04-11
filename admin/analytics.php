<?php
include('../server/connection.php');
session_start();

function getDailyTicketSales($conn) {
    $sql = "SELECT DATE(order_date) AS date, COUNT(*) AS sales FROM orders GROUP BY DATE(order_date)";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[$row['date']] = $row['sales'];
        }
    }
    return $data;
}

// Fetch daily ticket sales for each event function
function getDailyEventSales($conn) {
    $sql = "SELECT DATE(orders.order_date) AS date, events.event_name, COUNT(*) AS sales 
            FROM orders 
            JOIN order_items ON orders.order_id = order_items.order_id 
            JOIN events ON order_items.event_id = events.event_id 
            GROUP BY DATE(orders.order_date), events.event_name";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[$row['event_name']][$row['date']] = $row['sales'];
        }
    }
    return $data;
}

// Fetch event ranking by ticket sales function
function getEventRanking($conn) {
    $sql = "SELECT events.event_name, COUNT(*) AS sales 
            FROM orders 
            JOIN order_items ON orders.order_id = order_items.order_id 
            JOIN events ON order_items.event_id = events.event_id 
            GROUP BY events.event_name 
            ORDER BY sales DESC";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[$row['event_name']] = $row['sales'];
        }
    }
    return $data;
}

// Close database connection function
function closeDB($conn) {
    $conn->close();
}

$dailyTicketSales = getDailyTicketSales($conn);
$dailyEventSales = getDailyEventSales($conn);
$eventRanking = getEventRanking($conn);
closeDB($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Analytics</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Daily Ticket Sales</h2>
    <canvas id="dailySalesChart" width="400" height="200"></canvas>

    <h2>Daily Ticket Sales for Each Event</h2>
    <canvas id="eventSalesChart" width="400" height="200"></canvas>

    <h2>Event Ranking by Ticket Sales</h2>
    <ul>
        <?php foreach ($eventRanking as $eventName => $sales): ?>
            <li><?php echo $eventName . ': ' . $sales . ' tickets sold'; ?></li>
        <?php endforeach; ?>
    </ul>

    <script>
        // Draw chart for daily ticket sales
        var dailySalesData = <?php echo json_encode($dailyTicketSales); ?>;
        var ctxDailySales = document.getElementById('dailySalesChart').getContext('2d');
        var dailySalesChart = new Chart(ctxDailySales, {
            type: 'line',
            data: {
                labels: Object.keys(dailySalesData),
                datasets: [{
                    label: 'Daily Ticket Sales',
                    data: Object.values(dailySalesData),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Draw chart for daily ticket sales for each event
        var eventSalesData = <?php echo json_encode($dailyEventSales); ?>;
        var ctxEventSales = document.getElementById('eventSalesChart').getContext('2d');
        var eventSalesChart = new Chart(ctxEventSales, {
            type: 'line',
            data: {
                labels: Object.keys(dailySalesData),
                datasets: []
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Add dataset for each event to the chart
        Object.keys(eventSalesData).forEach(function(eventName) {
            eventSalesChart.data.datasets.push({
                label: eventName,
                data: Object.values(eventSalesData[eventName]),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            });
        });

        eventSalesChart.update();
    </script>
</body>
</html>
