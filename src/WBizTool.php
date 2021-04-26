<?php

use Carbon\CarbonInterface;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use GuzzleHttp\Client;

class WBizTool
{
    private $client;
    private $api_key;
    private $client_id;
    private $whatsapp_client;
    private $uri = "https://wbiztool.com/api/v1/send_msg/";

    public function __construct(string $api_key, string $client_id, string $whatsapp_client)
    {

        $this->client = new Client(["verify" => false]);

        $this->api_key = $api_key;
        $this->client_id = $client_id;
        $this->whatsapp_client = $whatsapp_client;
    }

    public function sendText(string $country_code, string $phone, string $msg): array
    {
        $resp = $this->client->post($this->uri, [
            "form_params" => [
                "client_id" => $this->client_id,
                "api_key" => $this->api_key,
                "whatsapp_client" => $this->whatsapp_client,
                "msg_type" => 0,
                "phone" => $phone,
                "country_code" => $country_code,
                "msg" => $msg
            ]
        ]);

        return json_decode($resp->getBody(), true);
    }

    public function getHistory(CarbonPeriod $period)
    {
        $end = $period->end->addDay(1);
        $resp = $this->client->post("https://wbiztool.com/api/v1/report/", [
            "form_params" => [
                "client_id" => $this->client_id,
                "api_key" => $this->api_key,
                "whatsapp_client" => $this->whatsapp_client,
                "start_date" => $period->start->format("d-m-Y"),
                "end_date" => $end->format("d-m-Y"),
            ]
        ]);

        return json_decode($resp->getBody(), true);
    }
}
