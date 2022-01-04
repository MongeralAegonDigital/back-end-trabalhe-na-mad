import React, { useEffect, useState } from 'react'
import Grid from '@mui/material/Grid';
import Typography from '@mui/material/Typography';
import TextField from '@mui/material/TextField';
import { Box, FormControl, MenuItem } from '@mui/material';
import axios from 'axios';
import * as Config from './../config/config'

const PersonalData = ({ register, errors }) => {

    const [marital_status_val, setMarital_status_val] = useState('');
    const [category_val, setCategory_val] = useState('');
    const [categories, setCategories] = useState([]);

    const marital_status = [
        { key: 'single', label: 'Solteiro' },
        { key: 'marriage', label: 'Casado' },
        { key: 'divorced', label: 'Divorciado' },
    ];

    useEffect(() => {
        getAll();
    }, []);

    const getAll = () => {
        axios
            .get(`${Config.API}/categories`)
            .then(resp => {
                const { data } = resp;
                setCategories(data);
            })
            .catch(error => {
                console.log(error);
            });
    }

    const handleChangeMatrialStatus = (event) => {
        setMarital_status_val(event.target.value);
    };

    const handleChangeCategory = (event) => {
        setCategory_val(event.target.value);
    };

    return (
        <React.Fragment>
            <Typography variant="h6" gutterBottom>
                Dados Pessoais
            </Typography>
            <Grid container spacing={3}>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.personal_data && errors.personal_data.RG ? true : false}
                        id="rg"
                        name="rg"
                        label="RG"
                        fullWidth
                        autoComplete="given-name"
                        variant="standard"
                        {...register('personal_data.RG', { required: true, minLength: 9, maxLength: 11 })}
                    />
                    {errors.personal_data && errors.personal_data.RG && errors.personal_data.RG.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O RG')}</Box>}
                    {errors.personal_data && errors.personal_data.RG && errors.personal_data.RG.type === "minLength" && <Box component="div" sx={{ color: 'red' }}>RG incorreto</Box>}
                    {errors.personal_data && errors.personal_data.RG && errors.personal_data.RG.type === "maxLength" && <Box component="div" sx={{ color: 'red' }}>RG incorreto</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.personal_data && errors.personal_data.number ? true : false}
                        id="number"
                        name="number"
                        label="Número"
                        fullWidth
                        type="number"
                        autoComplete="family-name"
                        variant="standard"
                        {...register('personal_data.number', { required: true, minLength: 1, maxLength: 10 })}
                    />
                    {errors.personal_data && errors.personal_data.number && errors.personal_data.number.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O Número')}</Box>}
                    {errors.personal_data && errors.personal_data.number && errors.personal_data.number.type === "maxLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(1, 10)}</Box>}
                    {errors.personal_data && errors.personal_data.number && errors.personal_data.number.type === "minLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(1, 10)}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.personal_data && errors.personal_data.ship_date ? true : false}
                        id="ship_date"
                        name="ship_date"
                        label="Data de Expedição"
                        fullWidth
                        autoComplete="family-name"
                        variant="standard"
                        InputLabelProps={{ shrink: true, required: true }}
                        type="date"
                        {...register('personal_data.ship_date', { required: true, maxLength: 20 })}
                    />
                    {errors.personal_data && errors.personal_data.ship_date && errors.personal_data.ship_date.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('A Data de Expedição')}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <TextField
                        error={errors.personal_data && errors.personal_data.issuing_body ? true : false}
                        id="issuing_body"
                        name="issuing_body"
                        label="Orgão Expedidor"
                        fullWidth
                        autoComplete="family-name"
                        variant="standard"
                        {...register('personal_data.issuing_body', { required: true, minLength: 5, maxLength: 80 })}
                    />
                    {errors.personal_data && errors.personal_data.issuing_body && errors.personal_data.issuing_body.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O Orgão Expedidor')}</Box>}
                    {errors.personal_data && errors.personal_data.issuing_body && errors.personal_data.issuing_body.type === "maxLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(5, 80)}</Box>}
                    {errors.personal_data && errors.personal_data.issuing_body && errors.personal_data.issuing_body.type === "minLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(5, 80)}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <FormControl variant="standard" sx={{ marginTop: 2, minWidth: 240 }}>
                        <TextField
                            select
                            error={errors.personal_data && errors.personal_data.marital_status ? true : false}
                            id="marital_status"
                            name="marital_status"
                            label="Estado Civil"
                            {...register('personal_data.marital_status', { required: true, maxLength: 20 })}
                            value={marital_status_val}
                            onChange={handleChangeMatrialStatus}
                        >
                            {
                                getMaritalStatus(marital_status)
                            }
                        </TextField>

                    </FormControl>
                    {errors.personal_data && errors.personal_data.marital_status && errors.personal_data.marital_status.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O Estado Civil')}</Box>}
                </Grid>
                <Grid item xs={12} sm={6}>
                    <FormControl variant="standard" sx={{ marginTop: 2, minWidth: 240 }}>
                        <TextField
                            select
                            error={errors.personal_data && errors.personal_data.category_id ? true : false}
                            id="category_id"
                            name="category_id"
                            label="Categoria"
                            {...register('personal_data.category_id', { required: true, maxLength: 20 })}
                            value={category_val}
                            onChange={handleChangeCategory}
                        >
                            {
                                getCategories(categories)
                            }
                        </TextField>
                    </FormControl>
                    {errors.personal_data && errors.personal_data.category_id && errors.personal_data.category_id.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('A Categoria')}</Box>}
                </Grid>
                <Grid item xs={12} sm={4}>
                    <TextField
                        error={errors.personal_data && errors.personal_data.company ? true : false}
                        id="company"
                        name="company"
                        label="Empresa"
                        fullWidth
                        autoComplete="family-name"
                        variant="standard"
                        {...register('personal_data.company', { minLength: 2, maxLength: 20 })}
                    />
                    {errors.personal_data && errors.personal_data.company && errors.personal_data.company.type === "maxLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(2, 20)}</Box>}
                    {errors.personal_data && errors.personal_data.company && errors.personal_data.company.type === "minLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(2, 20)}</Box>}
                </Grid>
                <Grid item xs={12} sm={4}>
                    <TextField
                        error={errors.personal_data && errors.personal_data.profession ? true : false}
                        id="profession"
                        name="profession"
                        label="Profissão"
                        fullWidth
                        autoComplete="family-name"
                        variant="standard"
                        {...register('personal_data.profession', { required: true, minLength: 5, maxLength: 20 })}
                    />
                    {errors.personal_data && errors.personal_data.profession && errors.personal_data.profession.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('A profissão')}</Box>}
                    {errors.personal_data && errors.personal_data.profession && errors.personal_data.profession.type === "maxLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(5, 20)}</Box>}
                    {errors.personal_data && errors.personal_data.profession && errors.personal_data.profession.type === "minLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(5, 20)}</Box>}
                </Grid>
                <Grid item xs={12} sm={4}>
                    <TextField
                        error={errors.personal_data && errors.personal_data.salary ? true : false}
                        id="salary"
                        name="salary"
                        label="Salário"
                        fullWidth
                        autoComplete="family-name"
                        variant="standard"
                        type="number"
                        {...register('personal_data.salary', { required: true, minLength: 4, maxLength: 10 })}
                    />
                    {errors.personal_data && errors.personal_data.salary && errors.personal_data.salary.type === "required" && <Box component="div" sx={{ color: 'red' }}>{Config.requiredMessage('O Salário')}</Box>}
                    {errors.personal_data && errors.personal_data.salary && errors.personal_data.salary.type === "maxLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(5, 10)}</Box>}
                    {errors.personal_data && errors.personal_data.salary && errors.personal_data.salary.type === "minLength" && <Box component="div" sx={{ color: 'red' }}>{Config.lengthFieldValidation(4, 10)}</Box>}
                </Grid>
            </Grid>
        </React.Fragment>
    )

}

const getMaritalStatus = (marital_status) => {
    return (
        marital_status.map(item => (
            <MenuItem key={item.key} value={item.key}>{item.label}</MenuItem>
        ))
    )
}

const getCategories = (categories) => {
    return (
        categories.map(item => (
            <MenuItem key={item.id} value={item.id}>{item.name}</MenuItem>
        ))
    )
}
export default PersonalData
