export class Student {

    private _name: string;
    private _age: number;
    private _sex: string;
    private _activities: string[] = ['Badminton', 'Course à pied', 'Volley', 'FootBall'];

    constructor(name: string, age: number, sex: string, activities: string[]) {
        this._name = name;
        this._age = age;
        this._sex = sex;
        this._activities = activities;
    }

    public get name(): string {
        return this._name
    }
    public get age(): number {
        return this._age
    }
    public get sex(): string {
        return this._sex
    }
    public get activities(): string[] {
        return this._activities
    }
}