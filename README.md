## SOLID

Laravel SOLID Design pattern with examples

## Open/Closed Principle (OCP)
The Open/Closed Principle (OCP) is one of the SOLID principles that states: "Software entities (classes, modules, functions, etc.) should be open for extension but closed for modification." In other words, you should be able to add new functionality to a class or module without changing its existing code. This principle helps you write code that’s flexible, extensible, and easier to maintain.

Example Project: Payment Gateway Integration in Laravel
Imagine you’re building an e-commerce application in Laravel where users can make payments using different payment providers (e.g., PayPal, Stripe, etc.). With the Open/Closed Principle in mind, you’ll set up a structure where adding a new payment gateway doesn’t require modifying existing code but instead involves extending it with new classes.

## Liskov Substitution Principle (LSP)
The Liskov Substitution Principle (LSP) is part of the SOLID principles and states that objects of a derived class should be able to replace objects of the base class without affecting the application's behavior. In Laravel, this principle is essential for writing maintainable and flexible code, especially when dealing with polymorphism and inheritance

Imagine a scenario where we have multiple ways to send notifications (e.g., email, SMS, and Slack). We’ll define a common interface for notifications and ensure that different notification methods can be used interchangeably.