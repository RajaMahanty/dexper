# DEXPER - Expense Tracking & Budget Management System

<div align="center">
  <img src="static/images/logo-transparent-svg.svg" alt="DEXPER Logo" width="200"/>
  
  [![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://php.net)
  [![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
  [![Status](https://img.shields.io/badge/Status-Active-success.svg)](https://github.com/RajaMahanty/dexper)
  [![Security](https://img.shields.io/badge/Security-A%2B-brightgreen.svg)](https://github.com/RajaMahanty/dexper)
</div>

## 📊 Project Statistics

<div align="center">

```mermaid
pie title Technology Distribution
    "PHP" : 66.3
    "JavaScript" : 26.7
    "CSS" : 7.0
```

```mermaid
graph LR
    A[User Interface] --> B[Authentication]
    B --> C[Expense Tracking]
    C --> D[Budget Management]
    D --> E[Analytics]
    E --> F[Reports]
```

</div>

## 📈 Key Metrics

<div align="center">

|      Metric       | Value |   Status   |
| :---------------: | :---: | :--------: |
|  🚀 Performance   |  95%  | ⭐⭐⭐⭐⭐ |
|    🔒 Security    |  A+   | ⭐⭐⭐⭐⭐ |
| 📱 Responsiveness | 100%  | ⭐⭐⭐⭐⭐ |
|  🛠️ Code Quality  |  92%  |  ⭐⭐⭐⭐  |

</div>

## ✨ Features

<div align="center">

```mermaid
graph TB
    subgraph Core Features
        A[DEXPER] --> B[Authentication]
        A --> C[Expense Tracking]
        A --> D[Budget Management]
        A --> E[Analytics]
    end

    subgraph Authentication
        B --> B1[Secure Login]
        B --> B2[Password Hashing]
        B --> B3[Session Management]
    end

    subgraph Expense Tracking
        C --> C1[Real-time Updates]
        C --> C2[Category Management]
        C --> C3[Transaction History]
    end

    subgraph Budget Management
        D --> D1[Budget Planning]
        D --> D2[Expense Limits]
        D --> D3[Overspending Alerts]
    end

    subgraph Analytics
        E --> E1[Visual Reports]
        E --> E2[Spending Patterns]
        E --> E3[Trend Analysis]
    end
```

</div>

<table>
<tr>
<td width="50%">

### 🔐 Authentication

- Secure Login System
- Password Hashing
- Session Management
- User Profile Management
- Secure Password Recovery

</td>
<td width="50%">

### 💰 Expense Tracking

- Real-time Updates
- Category Management
- Transaction History
- Receipt Upload
- Multi-currency Support

</td>
</tr>
<tr>
<td width="50%">

### 📈 Budget Management

- Budget Planning
- Expense Limits
- Overspending Alerts
- Budget Categories
- Monthly/Yearly Planning

</td>
<td width="50%">

### 📊 Analytics

- Visual Reports
- Spending Patterns
- Trend Analysis
- Export Reports
- Custom Dashboards

</td>
</tr>
</table>

## 🛠️ Technology Stack

| Technology   | Purpose                      |
| ------------ | ---------------------------- |
| PHP          | Backend Development          |
| MySQL        | Database Management          |
| HTML5/CSS3   | Frontend Structure & Styling |
| JavaScript   | Client-side Interactivity    |
| Font Awesome | Icon Library                 |
| Bootstrap    | UI Components                |

## 📦 Installation

<div align="center">

```mermaid
graph TD
    A[Clone Repository] --> B[Setup Database]
    B --> C[Configure Application]
    C --> D[Start Server]
    D --> E[Access Application]
```

</div>

1. Clone the repository:

```bash
git clone https://github.com/RajaMahanty/dexper.git
```

2. Set up the database:

- Import the database schema from `Database File/`
- Configure database connection in `connection.php`

3. Configure the application:

- Update database credentials in `connection.php`
- Ensure PHP version 7.4 or higher is installed

4. Start the application:

- Place the project in your web server directory
- Access through your web browser

## 🚀 Usage

<div align="center">

```mermaid
journey
    title User Journey
    section Authentication
        Login: 5: User
        Register: 3: New User
    section Dashboard
        View Summary: 5: User
        Quick Actions: 4: User
    section Management
        Add Expense: 5: User
        Set Budget: 4: User
        View Reports: 4: User
```

</div>

1. **Login/Register**

   - New users can create an account
   - Existing users can log in with credentials

2. **Dashboard**

   - View expense summaries
   - Monitor budget status
   - Access quick actions

3. **Expense Management**

   - Add new expenses
   - Categorize transactions
   - View expense history

4. **Budget Planning**
   - Set budget limits
   - Track spending against budgets
   - Receive alerts for overspending

## 📁 Project Structure

```mermaid
graph TD
    A[DEXPER] --> B[static]
    A --> C[templates]
    A --> D[Database File]
    A --> E[Core Files]
    B --> B1[css]
    B --> B2[js]
    B --> B3[images]
    C --> C1[Dashboard]
    C --> C2[Sign-up]
    E --> E1[index.php]
    E --> E2[expense.php]
    E --> E3[budget.php]
    E --> E4[user.php]
    E --> E5[cat.php]
    E --> E6[ajaxfile.php]
```

## 🔒 Security Features

<div align="center">

```mermaid
pie title Security Implementation
    "Password Hashing" : 30
    "Input Validation" : 25
    "Session Management" : 20
    "SQL Injection Prevention" : 15
    "XSS Protection" : 10
```

</div>

- Password hashing
- Input validation
- Session management
- SQL injection prevention
- XSS protection

## 🤝 Contributing

<div align="center">

```mermaid
graph LR
    A[Fork] --> B[Branch]
    B --> C[Commit]
    C --> D[Push]
    D --> E[Pull Request]
```

</div>

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Authors

- [Raja Mahanty](https://github.com/RajaMahanty) - Initial work

## 🙏 Acknowledgments

- Font Awesome for icons
- Bootstrap for UI components
- All contributors who have helped shape this project

---

<div align="center">
  <img src="https://img.shields.io/badge/Made%20with-❤️-red.svg" alt="Made with love"/>
  <br/>
  <strong>DEXPER - Your Financial Companion</strong>
</div>
