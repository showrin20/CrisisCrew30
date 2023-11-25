# CrisisCrew

CrisisCrew is a comprehensive disaster management and volunteer coordination platform designed to streamline disaster response efforts. Our project aims to empower both volunteers and administrators with the tools they need to effectively manage and respond to crisis situations.

## Directory Structure

The project is organized into the following directories:
```java
/CrisisCrew30
│
├── css/              # Stylesheets
│   ├── style.css
│   └── bootstrap.css
│
├── js/               # JavaScript files
│   ├── script.js
│   └── bootstrap.js
│
├── img/              # Images
│   ├── logo.png
│   └── ...
│
├── includes/         # PHP includes
│   ├── header.php
│   ├── footer.php
│   └── ...
│
├── pages/            # PHP pages
│   ├── admin.php
│   ├── volunteer.php
│   └── ...
│
├── process/          # PHP files for handling processes
│   ├── user_management.php
│   ├── event_management.php
│   ├── task_management.php
│   ├── resource_management.php
│   └── notification_system.php
│
├── vendor/           # Composer dependencies
│   └── ...
│
├── .gitignore        # Git ignore file
├── README.md         # Project documentation
├── index.php         # Main entry point
└── database.sql      # MySQL schema file

```
## Features

- **Admin Features:**
  - User Management
  - Event Management
  - Task Management
  - Resource Management
  - Notification System

- **Volunteer Features:**
  - User Dashboard
  - Profile Management
  - Task and Resource Interaction
  - Event Interaction

- **Global Volunteer Features:**
  - Signup and Portfolio
  - Invitation Handling

## Technologies Used

- HTML
- CSS
- Bootstrap
- PHP
- MySQL

## Getting Started

### Prerequisites

- Web server (e.g., Apache)
- PHP
- MySQL
- [Composer](https://getcomposer.org/) (for PHP dependencies)

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/your-repository.git


## Project Database Schema:
```sql
-- Create User Table
CREATE TABLE User (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Role ENUM('Admin', 'Volunteer', 'Global Volunteer') NOT NULL
);

-- Create Volunteer Table
CREATE TABLE Volunteer (
    VolunteerID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT UNIQUE,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Contact VARCHAR(15),
    Address VARCHAR(255),
    Location VARCHAR(50),
    Gender ENUM('Male', 'Female', 'Other'),
    BloodGroup VARCHAR(5),
    DateOfBirth DATE,
    Achievements TEXT,
    ProfilePhoto VARCHAR(255),
    FOREIGN KEY (UserID) REFERENCES User(UserID) ON DELETE CASCADE
);

-- Create Event Table
CREATE TABLE Event (
    EventID INT PRIMARY KEY AUTO_INCREMENT,
    EventName VARCHAR(100) NOT NULL,
    Date DATE NOT NULL,
    Location VARCHAR(255) NOT NULL,
    Description TEXT,
    SkillsNeeded TEXT
);

-- Create Task Table
CREATE TABLE Task (
    TaskID INT PRIMARY KEY AUTO_INCREMENT,
    EventID INT,
    VolunteerID INT,
    TaskName VARCHAR(100) NOT NULL,
    Status ENUM('Not Started', 'In Progress', 'Completed') NOT NULL,
    FOREIGN KEY (EventID) REFERENCES Event(EventID) ON DELETE CASCADE,
    FOREIGN KEY (VolunteerID) REFERENCES Volunteer(VolunteerID) ON DELETE CASCADE
);

-- Create Resource Table
CREATE TABLE Resource (
    ResourceID INT PRIMARY KEY AUTO_INCREMENT,
    TaskID INT,
    VolunteerID INT,
    ResourceName VARCHAR(100) NOT NULL,
    FOREIGN KEY (TaskID) REFERENCES Task(TaskID) ON DELETE CASCADE,
    FOREIGN KEY (VolunteerID) REFERENCES Volunteer(VolunteerID) ON DELETE CASCADE
);

-- Create Invitation Table
CREATE TABLE Invitation (
    InvitationID INT PRIMARY KEY AUTO_INCREMENT,
    EventID INT,
    VolunteerID INT,
    Status ENUM('Accepted', 'Declined') NOT NULL,
    FOREIGN KEY (EventID) REFERENCES Event(EventID) ON DELETE CASCADE,
    FOREIGN KEY (VolunteerID) REFERENCES Volunteer(VolunteerID) ON DELETE CASCADE
);

-- Create Notification Table
CREATE TABLE Notification (
    NotificationID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Content TEXT NOT NULL,
    Status ENUM('Read', 'Unread') NOT NULL,
    FOREIGN KEY (UserID) REFERENCES User(UserID) ON DELETE CASCADE
);

-- Insert Sample Data (for demonstration purposes)
INSERT INTO User (Username, Password, Role) VALUES
('admin', 'admin_password', 'Admin');

INSERT INTO Volunteer (UserID, FirstName, LastName, Email, Contact, Address, Location, Gender, BloodGroup, DateOfBirth, Achievements, ProfilePhoto) VALUES
(1, 'John', 'Doe', 'john@example.com', '123456789', '123 Main St', 'City', 'Male', 'A+', '1990-01-01', 'Volunteer of the Year', 'john.jpg');

INSERT INTO Event (EventName, Date, Location, Description, SkillsNeeded) VALUES
('Community Cleanup', '2023-01-15', 'Park', 'Join us for a community cleanup event!', 'Cleaning, Teamwork');

INSERT INTO Task (EventID, VolunteerID, TaskName, Status) VALUES
(1, 1, 'Collect Trash', 'Not Started');

INSERT INTO Resource (TaskID, VolunteerID, ResourceName) VALUES
(1, 1, 'Trash Bags');

INSERT INTO Invitation (EventID, VolunteerID, Status) VALUES
(1, 1, 'Accepted');

INSERT INTO Notification (UserID, Content, Status) VALUES
(1, 'You have a new task assigned.', 'Unread');

```
