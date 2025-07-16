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

## 📷 Screenshots

### Login 
<img width="1365" height="596" alt="image" src="https://github.com/user-attachments/assets/0889915b-c20a-45fc-b271-536ec9ea3540" />

### Recipe Dashboard
<img width="1341" height="589" alt="image" src="https://github.com/user-attachments/assets/10465f68-b5b1-45a4-995c-dc7646a86304" />

### Add New Recipe Form
<img width="1341" height="553" alt="image" src="https://github.com/user-attachments/assets/09332c69-87a8-4d90-991f-fd9d0b2fd632" />

### Recipe Report - Single Recipe
<img width="3064" height="1936" alt="localhost_recipeReport php" src="https://github.com/user-attachments/assets/5a3bdc05-9459-4a78-8f14-5359106a057a" />

### Recipe Report - Multiple Recipes
<img width="3064" height="6868" alt="localhost_recipeReport php (1)" src="https://github.com/user-attachments/assets/1e243115-0406-448e-8e72-affdcd00fe79" />

## ✅ Future Improvements

  1. Role-based access (admin vs viewer)
  2. Nutrition data validation
  3. Upload image per recipe
  4. Export report to PDF

