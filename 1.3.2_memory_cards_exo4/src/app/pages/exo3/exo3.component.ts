import { Component, OnInit } from '@angular/core';
import { Student } from 'src/app/models/Student';

@Component({
  selector: 'app-exo3',
  templateUrl: './exo3.component.html',
  styleUrls: ['./exo3.component.scss']
})
export class Exo3Component implements OnInit {

  students: Student[] = [];

  constructor() {
    this.students = [
      new Student('Rogers', 22, 'M', ['Badminton']),
      new Student('Moore', 23, 'F', ['Course à pied']),
      new Student('Sean', 21, 'M', ['Badminton', 'Volley']),
      new Student('Connery', 20, 'M', ['Badminton', 'Course à pied']),
      new Student('Boby', 16, 'M', ['FootBall']),
    ]
  }

  ngOnInit(): void {
  }

}
