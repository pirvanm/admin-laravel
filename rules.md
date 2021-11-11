Marbill PHP Code test
Example Email Marketing Tool
In this test assignment, imagine that we are building an Email Marketing Tool and want to validate our assumptions.
The goal is to get an MVP application with the following features:

 =============== user shall be able to log in to the application dashboard.

======user shall be able to add customer email with first and last name, sex and birth date. 
====Sex and birth date sometimes are missed.
 ==== There will be a lot of users.

user shall be able to create, edit and remove customer groups. 
Single customer may belong to more than one group.

-------- user shall be able to create an email template (inc. subject) to be used for customer groups mass sending.

 User shall be able to use placeholders within a template so that they will be replaced with the relevant user data on email sending.

no plans for attachments sending. Assume all images in email are hosted elsewhere or embedded with base64.

================== user shall be able to schedule mass-sending for a specified point in time.
================= user shall be able to run mass-sending immediately

The dashboard is a restricted area where all tasks above are performed.

Within the scope of this MVP we assume that we will hire a UI/UX specialist later to make it great, so for now we are focusing to make it working.

If you will have any further questions in regards these requirements, imagine the planned users of this tool have a minimum technical knowledge
and need an interface which is very easy to understand.
You have complete freedom to make it the way you want.


Required tools:
Laravel (any version >= 5.8)
PHP >= 7.0
MySQL or PostgreSQL
Git
Suggested tools
Twig for templates (or preg_replace for self-made templating)
Bootstrap for dashboard UI
Assume that email sending is encapsulated in a plain php function with the following signature:
/**
@throws EmailSendingException
*/
function sendEmail(string $subject, string $body, string $email): float {}
Further suggestions
Make it as minimal as possible and refuse the lure to go the extra mile, gold plating is your enemy here.
You are free to use any 3rd party code in any form, the only constraint is that you must not take any identical or similar solution and present it as
your own work: if you use some code that was not written by you, you just give it credits (list source and author).
It’s not welcomed using any 3rd party services such as AirTable or MailGun, SendGrid that might enable or already have these features. This
assignment is about checking how you are familiar with Laravel and how you generally organise your work and follow your decision making from
an engineering perspective.
We suggest you to start a bare Laravel project and commit it immediately and then organise your commits in such a way that each commit is an
atomic logical change.
Estimated completion time
Estimated completion time is 2-4 hours, though you are free to spend as much as you can/want.

Submission
The resulting project shall be submitted to any git hosting (github, bitbucket, gitlab or any other) with the instruction how to run it and all
necessary data, guides to make it work. You shall also make code accessible for us rather by making the project public or by sending an
invitation to the email address that you received this assignment from.
Good luck!