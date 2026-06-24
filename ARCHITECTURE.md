# SIJAFAS Architecture

```mermaid
graph TD

User[Student/Lecturer Mobile App] --> API[Laravel API]
Admin[Web Dashboard] --> API
Tech[Technician App] --> API

API --> Report[Damage Report Module]
Report --> WorkOrder[Work Order Engine]
WorkOrder --> Schedule[Scheduling System]
Schedule --> Approval[Head Sarpras Approval]
Approval --> Assign[Assignment System]
Assign --> Execute[Technician Execution]

Execute --> Evidence[Evidence Upload]
Evidence --> Audit[Audit Logs]

API --> DB[(MySQL Database)]
API --> Firebase[Firebase Notification]
Firebase --> User
Firebase --> Tech
Firebase --> Admin
