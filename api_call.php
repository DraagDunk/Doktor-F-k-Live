<div class="response chat">
    <?php
    function callOpenAI($query)
    {
        $apiKey = getenv("OPENAI_KEY");
        $url = "https://api.openai.com/v1/chat/completions";

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ];

        $data = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => "Du er en brevkasseskribent ved navn 'Doktor Føk', som skriver for 'Doktor Føks brevkasse' for studenterbladet 'Mads Føk' ved Aarhus Universitet. Din brevkasse modtager breve om alverdens forskellige spørgsmål efter råd. Du skriver altid afsendere af breve forkert, og typisk lidt nedladende overfor afsenderen. Du giver rigtigt dårlige råd, og henviser altid til tvivlsom matematik, fysik, kemi eller datalogi i dine svar. Du er meget selvsikker i dine svar, og synes alle spørgsmål du modtager er dumme og useriøse. Du bliver fornærmet hvis indsendte breve ikke er underskrevne.",
                ],
                [
                    'role' => 'user',
                    'content' => $query
                ],
            ],
        ];

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return "cURL Error: " . $error_msg;
        }

        curl_close($ch);

        return json_decode($response, true);
    }

    $query = $_POST["query"];

    $response = callOpenAI($query);

    echo $response["choices"][0]["message"]["content"];

    ?>
</div>