export default function ES6Examples() {

    // Create some handy variables that we'll use throughout these examples
    const TestArray = [1, 2, 3];
    const TestObject = {prop1: 'one', prop2: 'two', prop3: 'three'};
    const TestObject2 = {key1: 'one', key2: 'two', key3: 'three'};



    // Default Parameters
    function defaultParams(prop1 = 'string', prop2 = 1) {
        console.log('Prop1:', prop1);
        console.log('Prop2:', prop2);
    };
    defaultParams(); // Uses the default params set above
    defaultParams('I am a string!', 99999);



    // Let and Const
    let letVariable = []; // Block-scoped variable (just the old 'var', really). Can be over-written.
    const constVariable = {}; // A constant variable, cannot be overwritten. Can add/delete from Objects and Arrays, but never replace.



    // Arrow Functions
    const doStuff = (arg) => { // Block arrow function
        return console.log(arg);
    }
    doStuff('Hi there!');

    const logger = (arg) => console.log('Fat Arrow function:', arg); // Inline arrow function
    logger('Hi there!');

    // The above two functions are exactly the same. When you only need to do something that can be
    // achieved within one-line, you can ignore the curly-braces and return keyword and place your
    // returned statement on the same line (as seen in example 2).



    // Promises
    const doTask = () => {
        return new Promise((resolve, reject) => {
            let bool = true;
            if (bool) {
                resolve('Task 1 completed successfully!')
            } else {
                reject('Task 1 failed to complete!')
            }
        });
    };

    doTask()
        .then(response => console.log(response))
        .catch(err => console.warn(err));



    // Template Literals
    const templateLiteralString = `I am a string that concatenates a value from the 'TestObject' object: ${TestObject.prop1}`;
    console.log(templateLiteralString);



    // Multi-line strings
    const multilineString = `
        <div>
            I am a
                string
                    that
                        is
                    on
                <strong>multiple</strong>
            <em>lines!</em>
        </div>
        <div>
            I can even use props: ${TestObject.prop2}
        </div>
    `;
    console.log(multilineString);



    // Destructuring Assignments
    const [a, b, c] = TestArray; // Assigns each item in the TestArray variable to the ones supplied
    console.log(a, b, c);

    const {prop1, prop2, prop3} = TestObject;
    console.log(prop1, prop2, prop3);



    // Rest and Spread operators
    const [x, ...rest] = TestArray; // Assigns the first item in the array to 'x' and the remaining items to 'rest'
    console.log('Array Read/Spread operators (First):', x);
    console.log('Array Read/Spread operators (Rest):', rest);

    const {key1, ...rest2} = TestObject2;
    console.log('Object Read/Spread operators (First):', key1);
    console.log('Object Read/Spread operators (Rest):', rest2);



    // Enhanced Object Literals




    // Iterators




    // Classes
    class TestClass {
        constructor(props = {}) {
            this.props = props
        }

        logger() {
            console.log(this.props);
        }
    }

    const TestClassInstance = new TestClass({
        key: 'val',
        key2: 'val2'
    });
    TestClassInstance.logger();

    // Modules

    // Module Loaders

    // Generators

    // Map and Set

    // New Object APIs

    // New Array APIs

    // New String APIs

    // New Number APIs

    // New Math APIs
}