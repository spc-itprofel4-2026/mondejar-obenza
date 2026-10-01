# IT PROF EL 4 - Advanced System Integration and Architecture
## Semester Project, Week 6 Documentation Submission
### Planning, Security, and Your First Repository Entry

**Partner 1:** Eric Charls M. Mondejar
**Partner 2:** Reymar Obenza
**Course/Section:** BS-IT, Block -A / 80107
**Date:** September 2, 2026

**Chosen App or Organization (semester project):** "DSWD dxCLOUD (Digital Exchange – Client's Link of Unified Data)"

---

## Part 1. Planning Question Evaluation

**New request being evaluated (one sentence):**
Add a beneficiary notification feature that automatically informs authorized beneficiaries about the status of their assistance application through SMS or other available digital channels.

### 1. Does this solve a real problem?

Yes. Beneficiaries may have difficulty knowing whether their application or assistance request has been processed. A notification feature can provide timely updates and reduce the need for beneficiaries to repeatedly ask DSWD personnel about their application status.

### 2. Do we already have something that can do this?

The existing dxCLOUD focuses mainly on integrating and validating beneficiary information across different DSWD programs. A dedicated notification feature would be an additional function that could build on the beneficiary information and status already maintained by the system.

### 3. Does this support the organization's actual goals?

Yes. The feature supports DSWD's goal of improving the delivery and management of social protection services. Providing beneficiaries with timely status updates can also improve communication between DSWD personnel and the people receiving assistance.

### 4. Is it secure and cost-effective?

Yes, if the notification system only sends information to verified contact details and does not expose sensitive beneficiary information. It can also be cost-effective because it can be integrated with the existing system instead of requiring an entirely separate application. Proper access controls, secure APIs, and data protection measures should be implemented to protect beneficiary information.

### Where would this rank against other approved work?

(value, risk, dependency, or effort, reasoned in words, not calculated)

This would likely have medium to high value because it improves communication with beneficiaries. However, it may rank below core data security, validation, and system reliability work. Its implementation also depends on having accurate beneficiary contact information and a reliable notification service.

---

## Part 2. Security Pass Across the Four Domains

| Domain | Security Concern | Matching Control |
|--------|------------------|------------------|
| Business | Unauthorized personnel may send or view beneficiary notifications. | Use role-based access control so only authorized personnel can manage notifications. |
| Data | Beneficiary contact information may be exposed or used incorrectly. | Restrict access to contact information and protect it through secure storage, encryption, and access controls. |
| Application | An attacker could exploit the notification feature to send unauthorized messages or access beneficiary information. | Implement authentication, authorization, input validation, and secure session management. |
| Technology | The SMS or digital notification service could be compromised or improperly configured. | Use secure APIs, encrypted connections, updated software, and proper access credentials. |

### One weak-link risk

(how a weak point in one part could put a stronger part at risk):

If the notification service has weak authentication, an attacker could use it to access or expose beneficiary information even when the main dxCLOUD database is properly protected.

---

## Part 3. Your First Repository Entry

**Component being documented (application, data store, or technology platform):**
Beneficiary Information Data Store

| Field | Your Entry |
|-------|------------|
| What it does | Stores beneficiary information used by the system for identification, verification, and management of social assistance records. |
| Which department or user group uses it | Authorized DSWD personnel and program implementers who manage and verify beneficiary information. |
| What it connects to | It connects to the dxCLOUD application, beneficiary verification functions, different DSWD program databases, and other authorized government data sources. |
| Who is responsible for it | DSWD personnel, particularly the appropriate information technology and program management teams, are responsible for managing and maintaining the data. |
| Whether it is still needed, and why | Yes, it is still needed because accurate beneficiary information is necessary for verification, preventing duplicate records, processing assistance applications, and properly managing social protection programs. |
