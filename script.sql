create table public.users_details
(
    "detailsUserID" integer     not null
        constraint users_details_pk
            primary key,
    name            varchar(50) not null,
    surname         varchar(50) not null,
    "jobDetails"    varchar(255)
);

alter table public.users_details
    owner to yrnvbnqxfhzxyj;

create table public.flights
(
    "flightID"   integer      not null
        constraint flights_pk
            primary key,
    "flightInfo" varchar(255) not null,
    state        varchar(25)  not null
);

alter table public.flights
    owner to yrnvbnqxfhzxyj;

create table public.users
(
    "userID"      integer     not null
        constraint users_pk
            primary key,
    "userDetails" integer     not null
        constraint "users_users_details_detailsUserID_fk"
            references public.users_details,
    login         varchar(50) not null,
    password      varchar(50) not null
);

alter table public.users
    owner to yrnvbnqxfhzxyj;


