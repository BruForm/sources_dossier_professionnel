import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { Exo1Component } from './pages/exo1/exo1.component';
import { Exo3Component } from './pages/exo3/exo3.component';
import { Exo4Component } from './pages/exo4/exo4.component';
import { HomeComponent } from './pages/home/home.component';
import { HeaderComponent } from './partials/header/header.component';

const routes: Routes = [
  { path: 'home', component: HomeComponent },
  { path: 'exo1', component: Exo1Component },
  { path: 'exo3', component: Exo3Component },
  { path: 'exo4', component: Exo4Component },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
