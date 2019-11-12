// var initialData = [
//     { firstName: "Danny", lastName: "LaRusso", phones: [
//         { type: "Mobile", number: "(555) 121-2121" },
//         { type: "Home", number: "(555) 123-4567"}]
//     },
//     { firstName: "Sensei", lastName: "Miyagi", phones: [
//         { type: "Mobile", number: "(555) 444-2222" },
//         { type: "Home", number: "(555) 999-1212"}]
//     }
// ];
var initialData = [
    { firstName: "Danny", lastName: "LaRusso", phones: [
        { type: "Mobile", number: "(555) 121-2121" },
        { type: "Home", number: "(555) 123-4567"}], emails: [
        { type: "Personal", email: "one@email.com" },
        { type: "Work", email: "two@email.com"}]
    }
];

var ContactsModel = function(contacts) {
    var self = this;
    self.contacts = ko.observableArray(ko.utils.arrayMap(contacts, function(contact) {
        return { firstName: contact.firstName, lastName: contact.lastName, phones: ko.observableArray(contact.phones), emails: ko.observableArray(contact.emails)};
    }));

    
    this.submitKO = function() {
        // ... now do something
    }
 
    self.addContact = function() {
        self.contacts.push({
            firstName: "",
            lastName: "",
            phones: ko.observableArray()
        });
    };
 
    // self.removeContact = function(contact) {
    //     self.contacts.remove(contact);
    // };
 
    self.addPhone = function(contact) {
        contact.phones.push({
            type: "",
            number: ""
        });
    };
 
    self.removePhone = function(phone) {
        $.each(self.contacts(), function() { this.phones.remove(phone) })
    };

    self.addEmail = function(contact) {
        contact.emails.push({
            type: "",
            email: ""
        });
    };
 
    self.removeEmail = function(email) {
        $.each(self.contacts(), function() { this.emails.remove(email) })
    };
 
    self.save = function() {
        self.lastSavedJson(JSON.stringify(ko.toJS(self.contacts), null, 2));
    };

    self.lastSavedJson = ko.observable("")
};
 
ko.applyBindings(new ContactsModel(initialData));