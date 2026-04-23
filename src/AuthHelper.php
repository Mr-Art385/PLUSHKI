<?php
// src/AuthHelper.php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getCurrentUserId() {
    return $_SESSION['user_id'] ?? null;
}

function getCurrentUser($db) {
    if (!isLoggedIn()) return null;
    $pdo = $db->getPDO();
    $stmt = $pdo->prepare("SELECT id, login, email, created_at FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function loginUser($userId, $login) {
    $_SESSION['user_id'] = $userId;
    $_SESSION['user_login'] = $login;
}

function logoutUser() {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_login']);
    // Не очищаем корзину, она останется в БД
}

function registerUser($db, $login, $email, $password) {
    $pdo = $db->getPDO();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (login, email, password_hash) VALUES (?, ?, ?)");
    $stmt->execute([$login, $email, $hash]);
    return $pdo->lastInsertId();
}

function userExists($db, $login, $email) {
    $pdo = $db->getPDO();
    $stmt = $pdo->prepare("SELECT id FROM users WHERE login = ? OR email = ?");
    $stmt->execute([$login, $email]);
    return $stmt->fetch() !== false;
}