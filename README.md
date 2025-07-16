# 🍽️ Recipe Report App 

A secure full-stack web application that allows users to manage and generate analytical recipe reports based on data inspired by the BBC Good Food site. Built using PHP, MySQL, and JavaScript, this system enables dynamic data entry, recipe selection, and nutritional report generation using interactive charts.

## 🔍 Project Overview

This application is designed for non-technical staff to:
- Add, view, and delete recipe entries
- Generate nutrition-based reports using checkboxes and dynamic chart rendering
- Securely log in and manage all recipe-related data via a user-friendly web interface

## 🛠️ Technologies Used

- **PHP** – Server-side scripting
- **MySQL** – Recipe data storage
- **JavaScript** – Front-end interaction and Chart rendering
- **Chart.js** – Nutrition pie chart & comparison bar chart
- **HTML/CSS** – Provided and modified UI
- **SQL** – Data retrieval and manipulation
- **Authentication** – Basic username/password system

## ✨ Features

### 🔐 Secure Access
- Login system ensures only authorized users can access and modify data.

### 📋 Recipe Management
- Add new recipe data through a web form.
- Delete stored recipes using checkboxes.
- All data stored in a MySQL database.

### 📊 Report Generation
- Select recipes via checkbox interface.
- Generate detailed HTML table report.
- Display:
  - **Pie chart** for nutrition breakdown (single recipe)
  - **Bar chart** for nutritional comparison (multiple recipes)

### 📈 Charting (Using Chart.js)
- Pie chart shows carbohydrates, fats, proteins, and other nutritional info
- Bar chart compares selected recipes' nutrition side-by-side
