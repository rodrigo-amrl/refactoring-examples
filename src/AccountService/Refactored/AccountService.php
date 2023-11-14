<?php

namespace App\AccountService\Refactored;

use DateTime;
use Exception;
use PDO;

class AccountService
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('pgsql:host=localhost;port=5432;dbname=app;user=postgres;password=123456');
    }

    public function sendEmail(string $email, string $subject, string $message): void
    {
        echo $email, $subject, $message;
    }

    public function validateCpf(string $str): bool
    {
        if ($str !== null) {
            if ($str !== null) {
                if (strlen($str) >= 11 && strlen($str) <= 14) {
                    $str = str_replace(['.', '-', ' '], '', $str);

                    if (!str_split($str, 1) === $str[0]) {
                        try {
                            $d1 = $d2 = 0;
                            $dg1 = $dg2 = $rest = 0;
                            $digito = 0;
                            $nDigResult = 0;

                            for ($nCount = 1; $nCount < strlen($str) - 1; $nCount++) {
                                $digito = (int)substr($str, $nCount - 1, 1);
                                $d1 = $d1 + (11 - $nCount) * $digito;
                                $d2 = $d2 + (12 - $nCount) * $digito;
                            }

                            $rest = $d1 % 11;
                            $dg1 = $rest < 2 ? 0 : 11 - $rest;
                            $d2 += 2 * $dg1;
                            $rest = $d2 % 11;

                            if ($rest < 2) {
                                $dg2 = 0;
                            } else {
                                $dg2 = 11 - $rest;
                            }

                            $nDigVerific = substr($str, -2);
                            $nDigResult = "$dg1$dg2";

                            return $nDigVerific === $nDigResult;
                        } catch (Exception $e) {
                            echo "Erro !" . $e->getMessage();
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function signup(array $input): array
    {
        $accountId = uniqid();

        $verificationCode = uniqid();
        $date = new DateTime();

        $stmt = $this->pdo->prepare("SELECT * FROM cccat13.account WHERE email = ?");
        $stmt->execute([$input['email']]);
        $existingAccount = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$existingAccount) {
            if (preg_match('/[a-zA-Z] [a-zA-Z]+/', $input['name'])) {
                if (filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
                    if ($this->validateCpf($input['cpf'])) {
                        if ($input['isDriver']) {
                            if (preg_match('/[A-Z]{3}[0-9]{4}/', $input['carPlate'])) {
                                $stmt = $this->pdo->prepare("INSERT INTO cccat13.account (account_id, name, email, cpf, car_plate, is_passenger, is_driver, date, is_verified, verification_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                $stmt->execute([$accountId, $input['name'], $input['email'], $input['cpf'], $input['carPlate'], !!$input['isPassenger'], !!$input['isDriver'], $date->format('Y-m-d H:i:s'), false, $verificationCode]);

                                $this->sendEmail($input['email'], "Verification", "Please verify your code at first login $verificationCode");

                                return [
                                    'accountId' => $accountId
                                ];
                            } else {
                                throw new Exception("Invalid plate");
                            }
                        } else {
                            $stmt = $this->pdo->prepare("INSERT INTO cccat13.account (account_id, name, email, cpf, car_plate, is_passenger, is_driver, date, is_verified, verification_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                            $stmt->execute([$accountId, $input['name'], $input['email'], $input['cpf'], $input['carPlate'], !!$input['isPassenger'], !!$input['isDriver'], $date->format('Y-m-d H:i:s'), false, $verificationCode]);

                            $this->sendEmail($input['email'], "Verification", "Please verify your code at first login $verificationCode");

                            return [
                                'accountId' => $accountId
                            ];
                        }
                    } else {
                        throw new Exception("Invalid cpf");
                    }
                } else {
                    throw new Exception("Invalid email");
                }
            } else {
                throw new Exception("Invalid name");
            }
        } else {
            throw new Exception("Account already exists");
        }
    }

    public function getAccount(string $accountId): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM cccat13.account WHERE account_id = ?");
        $stmt->execute([$accountId]);
        $account = $stmt->fetch(PDO::FETCH_ASSOC);
        return $account;
    }
}
