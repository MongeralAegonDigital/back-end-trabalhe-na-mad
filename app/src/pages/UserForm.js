import React, { useState } from 'react'
import Grid from '@mui/material/Grid';
import Typography from '@mui/material/Typography';
import TextField from '@mui/material/TextField';
import { Box } from '@mui/system';
import * as Config from './../config/config'
import axios from 'axios';

const UserForm = ({ register, errors }) => {

    const emailIsUnique = async (email) => {
        const val = await axios.get(`${Config.API}/users/emailIsUnique/${email}`);
        return val.data;
    };

    const cpfIsValid = async (cpf) => {
        const val = await axios.get(`${Config.API}/users/cpfIsValid/${cpf}`);
        return val.data;
    };

    return (
        <React.Fragment>
            <Typography variant="h6" gutterBottom>
                Dados do Cliente
            </Typography>

            <Grid container spacing={3}>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.name ? true : false}
                        id="name"
                        name="name"
                        label="Nome"
                        fullWidth
                        autoComplete="given-name"
                        variant="standard"
                        {...register('name', { required: true, minLength: 3, maxLength: 80 })}
                    />
                    {errors.name && errors.name.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O Nome')}</Box>}
                    {errors.name && errors.name.type === "maxLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(3, 80)}</Box>}
                    {errors.name && errors.name.type === "minLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(3, 80)}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.email ? true : false}
                        id="email"
                        name="email"
                        label="E-mail"
                        fullWidth
                        autoComplete="family-name"
                        variant="standard"
                        type="email"
                        {...register('email', { required: true, maxLength: 20, validate: emailIsUnique })}
                    />
                    {errors.email && errors.email.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O E-mail')}</Box>}
                    {errors.email && errors.email.type === "validate" && <Box component="div" sx={{ color: 'red' }}>O E-mail já existe</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.cpf ? true : false}
                        id="cpf"
                        name="cpf"
                        label="CPF"
                        fullWidth
                        variant="standard"
                        type="number"
                        {...register('cpf', { required: true, length: 11, validate: cpfIsValid })} />

                    {errors.cpf && errors.cpf.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O CPF')}</Box>}
                    {errors.cpf && errors.cpf.type === "validate" && <Box component="div" sx={{ color: 'red' }}>CPF inválido</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.phone ? true : false}
                        id="phone"
                        name="phone"
                        label="Phone"
                        fullWidth
                        autoComplete="family-name"
                        variant="standard"
                        type="number"
                        {...register('phone', { required: true, minLength: 11, maxLength: 20 })} />

                    {errors.phone && errors.phone.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O Phone')}</Box>}
                    {errors.phone && errors.phone.type === "maxLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(11, 20)}</Box>}
                    {errors.phone && errors.phone.type === "minLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(11, 20)}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.birth_date ? true : false}
                        id="birth_date"
                        name="birth_date"
                        label="Data de Nascimento"
                        fullWidth
                        autoComplete="family-name"
                        variant="standard"
                        InputLabelProps={{ shrink: true, required: true }}
                        type="date"
                        {...register('birth_date', { required: true, maxLength: 20 })}
                    />
                    {errors.birth_date && errors.birth_date.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('A Data de nascimento')}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.password ? true : false}
                        id="password"
                        name="password"
                        label="Senha"
                        fullWidth
                        autoComplete="given-name"
                        variant="standard"
                        type="password"
                        {...register('password', { required: true, minLength: 6, maxLength: 12 })}
                    />
                    {errors.password && errors.password.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('A Senha')}</Box>}
                    {errors.password && errors.password.type === "maxLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(6, 12)}</Box>}
                    {errors.password && errors.password.type === "minLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(6, 12)}</Box>}
                </Grid>
            </Grid>
        </React.Fragment>
    )
}

export default UserForm
